<?php
  	include "connect.php";
    isLogged();
    db_connect();
  	if(isset($_POST['submit1']))
  	{
	  	 $password = trim($_POST['newpassword']);
	     $repassword = trim($_POST['renewpassword']);
	     $oldpass = trim($_POST['password']);
	     $user_id = $_SESSION['user_info']['user_id'];
	     if(md5($oldpass) == $_SESSION['user_info']['password'])
	     {
	     	 if(strlen($password) > 3)
	     	 {
	     	    if($password == $repassword)
		        {
		           $password = md5($password);
		           $repassword = md5($repassword);
		           $sql=mysql_query("UPDATE users SET password='$password' WHERE user_id='$user_id' ") or die(mysql_error()); 
		           $_SESSION['user_info']['password'] = $password;
				   //header("Location: Profile.php");
				   echo '<script language="javascript">alert("Success!!!");
				           window.location = "Profile.php";</script>';
				   exit;
		        }
		        else 
		        {
		          $error['repassword'] = "the two passwords are incorrect";
		          echo '<script language="javascript">alert("the two passwords are incorrect!!!");
				           window.location = "Profile.php";</script>';
		        }
	     	 }
	         else 
	     	 {
	     		$error['shortnewpass'] = "the password must contain more than 3 chars";
	     		echo '<script language="javascript">alert("the password must contain more than 3 chars!!!");
				           window.location = "Profile.php";</script>';
	     	 }
	      }
	      else
	      {
	     	echo '<script language="javascript">alert("Wrong old pass!!!");
				           window.location = "Profile.php";</script>';
	      }
  	}
  	db_close(db_connect());