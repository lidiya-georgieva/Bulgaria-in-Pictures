<?php

include "connect.php";
isLogged();
db_connect();
   if(isset($_POST['submit']))
   {
	$cat_id = (int)$_POST['select1'];
	$query="DELETE FROM categories WHERE cat_id = '$cat_id'";
	$query2 = "DELETE FROM pictures WHERE cat_id = '$cat_id'";
	mysql_query($query);
	mysql_query($query2) or die(mysql_error());
	header("Location:slideshow.php");
   }	
db_close(db_connect());
?>