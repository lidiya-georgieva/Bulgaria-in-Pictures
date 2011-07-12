<?php 
include "connect.php";
//isLogged();
db_connect();
/*$sql = "SELECT content FROM pictures WHERE pic_id=3";
$result = mysql_query($sql) or die("Нещо малко сладко и пухкаво умря: " . mysql_error());

header("Content-type: image/jpeg");
//header("Content-type: png/jpeg");
echo mysql_result($result, 0);
db_close(db_connect());*/

$query = mysql_query("SELECT * FROM pictures WHERE pic_id='3'");
$row = mysql_fetch_array($query);
$content = $row['content'];
echo $row['description'];

echo $content;
header('Content-type: image/jpg');



?>



