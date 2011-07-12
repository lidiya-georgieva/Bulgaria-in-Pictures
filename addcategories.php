<?php
include "connect.php";
db_connect();
isLogged();
  if($_POST['hid'])
  {
  	$cat_name = addslashes(trim($_POST['name']));
  	if(strlen($cat_name) < 1)
  	{
  		//echo "must enter something";
  		header("Location: slideshow.php");
  		exit;
  	}
  	else 
  	{
  		/*check if we already have this cat_name*/
  		 $user_id = $_SESSION['user_info']['user_id'];
  		 $sql = "SELECT * FROM categories WHERE user_id = '$user_id' AND name = '$cat_name' LIMIT 1";
	     $res = mysql_query($sql) or die( mysql_error());
	     if(mysql_num_rows($res) > 0)
	     {
  		 	echo '<script language="javascript">alert("Imate kategoriq s tova ime!!!");
				window.location = "slideshow.php";</script>';
  		 }
  		 else 
  		 {
  		    mysql_query("INSERT INTO categories VALUES ('','$user_id','$cat_name')");
       	    if(mysql_error())
       	    {
       	    	echo "ERROR! Try again!";
       	    }
       	    else 
       	    {
       	    	echo '<script language="javascript">alert("Success!!!");
				window.location = "slideshow.php";</script>';
       	    }
  		 }
  	}
  }