<?php
include "connect.php";
isLogged();
db_connect();

$user_id=$_SESSION['user_info']['user_id'];
$sql = "SELECT cat_id FROM categories WHERE user_id = '$user_id' ";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$cat_id = $row['cat_id'];
$query="DELETE FROM users WHERE user_id='$user_id'";
$query2="DELETE FROM categories WHERE user_id='$user_id'";
$query3 = "DELETE FROM pictures WHERE cat_id = '$cat_id'";
$result1=mysql_query($query);
$result2=mysql_query($query2);
mysql_query($query3);
header("Location: index.php");

db_close(db_connect());
?>