<?php
	include "connect.php";
	session_start();
/*	if (!isset($_SESSION['is_logged']))
   {*/
	if(isset($_POST['submit']))/*the submit is pressed*/
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if(strlen($username) && strlen($password))
		{
			db_connect();
			$username = addslashes($username);
			$password = md5($password);
			$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
			$res = mysql_query($sql) or die( mysql_error());
			if(mysql_num_rows($res) == 1)
			{
				$row = mysql_fetch_assoc($res);
				$_SESSION['is_logged'] = true;
				$_SESSION['user_info'] = $row;
				header("Location: beginning.php");
				exit;
			}
			else if(mysql_num_rows($res) == 0)
			{
				echo '<script language="javascript">alert("Грешно потребителско име или парола!!!");
				           window.location = "index.php";</script>';
			}
		}
	}
   
?>