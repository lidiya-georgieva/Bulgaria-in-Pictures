<?php
include "connect.php";
isLogged();
db_connect();
$name = addslashes(trim($_POST['name']));
if(strlen($name) < 1)
 {
  	echo '<script language="javascript">alert("Must enter sth!!!");
		 window.location = "Profile.php";</script>';
 }
 else 
 {
	$pic_id = $_SESSION['pic_id'];
    $sql=mysql_query("UPDATE pictures SET name ='$name' WHERE pic_id='$pic_id' ") or die(mysql_error());  
    header("Location: slideshow.php");       	
 }
?>  	
