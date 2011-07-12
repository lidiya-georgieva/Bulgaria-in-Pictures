<?php
include "header.php";
db_connect();

$sql = "SELECT user_id,username,name,lastname FROM users";
$res = mysql_query($sql);
while($row = mysql_fetch_array($res))
{
	$_SESSION['id'] = $row['user_id'];
	echo '<div class="profile"><a href="lookup.php?id='.$_SESSION['id'].'"><i>Username:</i> 
	'.$row['username'].' |<i>Name:</i> '.$row['name'].' '.$row['lastname'].'
	</a></div>';
}
include "footer.php";
