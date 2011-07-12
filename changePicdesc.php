<?php
include "connect.php";
isLogged();
db_connect();
if(isset($_POST['submit']))
  	{
  		$desc = addslashes($_POST['description']);
	    $pic_id = $_SESSION['pic_id'];
		$sql=mysql_query("UPDATE pictures SET description ='$desc' WHERE pic_id='$pic_id' ") or die(mysql_error());  
	    header("Location: slideshow.php");
	    exit;
  	}
db_close(db_connect());
?>  	
