<?php
  include "connect.php";
  session_start();
   
  /*if(!$_SESSION['is_logged']==true)
  {*/
     if(isset($_POST['submit']))/*it means the form is submitted*/
     {
       $username = trim($_POST['username']);
       $password = trim($_POST['password']);
       $repassword = trim($_POST['repassword']);
       $firstname = trim($_POST['firstname']);
       $lastname = trim($_POST['lastname']);
       $error['0']=0;
       if(strlen($username) < 4) /*the username must be > 4 chars*/
       {
          $error['username'] = "the username must be at least 4 chars";
		  echo '<script language="javascript">alert("the username must be at least 4 chars!!!");
				           window.location = "index.php";</script>';
       }
       if(strlen($password) < 4)
       {
       	  $error['password'] = "the password must be at least 4 chars";
		   echo '<script language="javascript">alert("the password must be at least 4 chars!!!");
				           window.location = "index.php";</script>';
       }
       if($password != $repassword)
       {
          $error['repassword'] = "the two passwords are incorrect";
		  echo '<script language="javascript">alert("the two passwords are incorrect!!!");
				           window.location = "index.php";</script>';
       }
       if(empty($firstname) || empty($lastname))
       {
       	  $error['names'] = "emty fields";
       }
       if(!preg_match("([A-Za-z0-9])",$username))
       {
       	  $error['regname'] = "the username consists only of letters, digits, _, - and . ";
       	  echo '<script language="javascript">alert("the username consists only of letters, digits, _, - and . !!!");
				           window.location = "index.php";</script>';
       }
       if(count($error) == 1)/*we do not have a mistake*/
       {
       	  db_connect();

       	  $sql = 'SELECT COUNT(*) as count FROM users WHERE username = "'.addslashes($username).'"';
       	  $result = mysql_query($sql) or die(mysql_error());
       	  $row = mysql_fetch_assoc($result);//an array , count is a key
       	  if($row['count'] == 0)
       	  {
       	  	/*the username is free*/
       	  	$username = addslashes($username);
       	  	$password = md5($password);
       	  	$firstname = addslashes($firstname);
       	  	$lastname = addslashes($lastname);
       	  	
       	  	mysql_query("INSERT INTO users VALUES ('','$username','$password','$firstname','$lastname','".time()."')") or die(mysql_error());
       	  	$catname = $username;
       	  	$sql = "SELECT * FROM users WHERE username = '$username'";
       	  	$res = mysql_query($sql);
       	  	$row = mysql_fetch_array($res);
       	  	$user_id = $row['user_id'];
       	  	$user_id;
       	    mysql_query("INSERT INTO categories VALUES ('','$user_id','$catname')") or die(mysql_error());
       	   // echo "success";
       	    //header("Location: beginning.php");
       	   echo '<script language="javascript">alert("Log in now");
				window.location = "index.php";</script>';
       	  }
       	  else 
       	  {
       	    /*we have already this username*/
       	  		echo '<script language="javascript">alert("Busy name!!!");
				           window.location = "index.php";</script>';
       	  }
       	  
       }
       else echo "some error";
     }
  
  