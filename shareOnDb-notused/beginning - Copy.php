<!DOCTYPE>
<html>
<head>
 <title>Bulgaria in Pictures </title>
 <link rel="stylesheet" href="style.css" />
 <link rel="stylesheet" href="index.css" />
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
   	<ul id="slideshow">
	<?php 
	  db_connect();
	  $sql = "SELECT * FROM pictures WHERE cat_id = '15'";
	  $res = mysql_query($sql);
	  while ($row = mysql_fetch_array($res))
	  {
	  	echo '<li>';
			echo '<h3>'.$row['name'].'</h3>';
			echo '<span>picturesAll/'.$_SESSION['user_info']['user_id'].'/thumb_'.$row['filename'].'</span>';
			echo '<p></p><a href="#"><img src="picturesAll/'.$_SESSION['user_info']['user_id'].'/thumb_'.$row['filename'].'" alt="Orange Fish" /></a>
		</li>';
	  }
	  ?>
	  
	</ul>
	<div id="wrapper">
		<div id="fullsize">
			<div id="imgprev" class="imgnav" title="Previous Image"></div>
			<div id="imglink"></div>
			<div id="imgnext" class="imgnav" title="Next Image"></div>
			<div id="image"></div>
			<div id="information">
				<h3></h3>
				<p></p>
			</div>
		</div>
		<div id="thumbnails">
			<div id="slideleft" title="Slide Left"></div>
			<div id="slidearea">
				<div id="slider"></div>
			</div>
			<div id="slideright" title="Slide Right"></div>
		</div>
	</div>
<script type="text/javascript" src="compressed.js"></script>
<script type="text/javascript">
	$('slideshow').style.display='none';
	$('wrapper').style.display='block';
	var slideshow=new TINY.slideshow("slideshow");
	window.onload=function(){
		slideshow.auto=true;
		slideshow.speed=5;
		slideshow.link="linkhover";
		slideshow.info="information";
		slideshow.thumbs="slider";
		slideshow.left="slideleft";
		slideshow.right="slideright";
		slideshow.scrollSpeed=4;
		slideshow.spacing=5;
		slideshow.active="#fff";
		slideshow.init("slideshow","image","imgprev","imgnext","imglink");
	}
</script>
   </div>
	 
   <div class="menu">
   </div>
   <div id="footer">
   </div>
   </div>
</div>
</body>
</html>