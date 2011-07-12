<?php 

 include "connect.php";
 session_start();
 db_connect();
 /*checking username*/
 if(isset($_POST['username']))
 { 
	$uname = $_POST['username']; 
	$query = mysql_query("SELECT * FROM users WHERE username = '$uname'"); 
	if($num = mysql_num_rows($query))
	{ 
	  echo "1"; // Ако потребителското име съществува връщаме "1" 
	}
	/*else  if(preg_match("([A-Za-z0-9])"),$username))
	{ 
	  echo "4";
	} */
    else if(strlen($uname) < 4) 
	{
	   echo "3";
	}
	else 
	{
	   echo "2";
	}
 } 
 /*checking password*/
 if(isset($_POST['password']))
 {
     $password = $_POST['password'];
     if(strlen($password) < 4)
	 {
	    echo "1";
	 }
     else echo "2";
 }
 
 if (isset($_POST['repassword']) && isset($_POST['password']))
 {
    $repassword = $_POST['repassword'];

    if(strcmp($repassword,$password)!=0)
	{
	   echo "1";
	}
	else echo "2";
 }
 

?>