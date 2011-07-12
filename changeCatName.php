<?php
include "connect.php";
isLogged();
db_connect();
if(isset($_POST['submit1']))
  	{
  		 $name = addslashes(trim($_POST['newname']));
  		 if(strlen($name) < 1)
  	     {
  		   echo '<script language="javascript">alert("Must enter sth!!!");
				window.location = "slideshow.php";</script>';
  	     }
	     else 
	     {
	       $cat_id = (int)$_POST['select2'];
		   $sql=mysql_query("UPDATE categories SET name ='$name' WHERE cat_id='$cat_id' ") or die(mysql_error());  
		   header("Location: slideshow.php");   	
	     }
  	}
db_close(db_connect());
?>  	
