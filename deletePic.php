<?php
include "connect.php";
isLogged();
db_connect();
$pic_id = $_SESSION['pic_id'];
$user_id = $_SESSION['user_info']['user_id'];
if($pic_id > 0)
{
	$query="DELETE FROM pictures WHERE pic_id = '$pic_id'";
	mysql_query($query) or die(mysql_error());
	header("Location: slideshow.php");
}
db_close(db_connect());
?>
