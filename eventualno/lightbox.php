<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> Stu Nicholls | CSSplay | Cross Browser Multi Page Photograph Gallery</title>
<meta name="Author" content="Stu Nicholls" />

<link rel = "stylesheet" href = "gallery.css"/>
<link rel="stylesheet" href = "index.css"/>

</head>

<body>
<div id="big">
     <?php 
       include "connect.php";
       isLogged();
     ?>
   <div id="container">
   <div id="header">
   </div>
   <div class="menu">
   <ul class = "navbar">
	    <li><a href="beginning.php">Home</a> </li>
		<li> <a href="addcategory.php">Categories</a></li>
		<li> <a href="addpics.php">Pictures</a></li>
		<li> <a href="Profile.php">Profile</a></li>
		<li> <a href="logout.php">Logout </a></li>
	</ul>
   </div>
   <div class="text">
   
<div class="photo">
<ul class="topic">
<?php
 db_connect();
 $sql = "SELECT name,cat_id FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
 $query = mysql_query($sql) or die(mysql_error());
 while($row = mysql_fetch_array($query))
   {
   	echo '<li class = "active"><a class="set" href="#'.$row['name'].'">'.$row['name'].'</a>';
    $sql2 = "SELECT filename FROM pictures WHERE cat_id = '".$row['cat_id']."'";
    $query2 = mysql_query($sql2) or die(mysql_error());
    
       echo '<ul>';
     	while($row2 = mysql_fetch_array($query2))
     	{
     	 echo '<li><a href="picturesAll/'.$_SESSION['user_info']['user_id'].'/
   		'.$row2['filename'].'"><img src="picturesAll/'.$_SESSION['user_info']['user_id'].'/thumb_'.$row2['filename'].'"/>'; 
   		 echo '</a></li>';
     	
     	}
       	echo '</ul>';
    
   	echo '</li>';
   }
   ?>
</ul>
<br class="clear" />
</div>

<div class="menu">
   </div>
   <div id="footer">
   </div>
   </div>
</div>
</body>
</html>

