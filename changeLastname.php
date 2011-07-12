<?php
include "connect.php";
isLogged();
db_connect();

if(isset($_POST['submit3']))
  	{
  		 $name = addslashes(trim($_POST['newlastname']));
	     $pass = trim($_POST['password']);
	     $user_id = $_SESSION['user_info']['user_id'];
	     if(md5($pass) == $_SESSION['user_info']['password'])
	        { 
	        	if(strlen($name))
	        	{
		          $sql=mysql_query("UPDATE users SET lastname ='$name' WHERE user_id='$user_id' ") or die(mysql_error()); 
				  header("Location: Profile.php");
	        	}
	        	else 
	        	{
	        		echo '<script language="javascript">alert("Must enter sth!!!");
				           window.location = "Profile.php";</script>';
	        	}
	        }
	      else
	      {
	     	echo '<script language="javascript">alert("Wrong pass!!!");
				   window.location = "Profile.php";</script>';
	      }
  	}
db_close(db_connect());
?>