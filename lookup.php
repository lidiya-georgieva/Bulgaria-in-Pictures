
<!DOCTYPE>
<html>
<head>
 <title>Bulgaria in Pictures </title>
 <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
 <link rel="stylesheet" href="index.css" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
<body>
<div class="big">
     <?php 
       include "connect.php";
       isLogged();
       db_connect();
     ?>
   <div class="container">
   <div class="header">
   </div>
  
   <ul class = "navbar">
	    <li><a class = "A" href="beginning.php"></a></li>
	    <li><a class = "B" href="look.php"></a></li>
		<li> <a class = "C" href="slideshow.php"></a></li>
		<li> <a class = "D" href="addpics.php"></a></li>
		<li> <a class = "E" href="Profile.php"></a></li>
	</ul>
 
   <div class="text">
	<ul id="slideshow">
	<?php 
	 $user_id=$_GET['id'];
     $sql = "SELECT name,cat_id FROM categories WHERE user_id = '$user_id'";
     $query = mysql_query($sql) or die(mysql_error());
     while($row = mysql_fetch_array($query))
     {
       $sql2 = "SELECT filename,name,description FROM pictures WHERE cat_id = '".$row['cat_id']."'";
   	   $query2 = mysql_query($sql2) or die(mysql_error());
       while($row2 = mysql_fetch_array($query2))
   	   {
    ?>
		<li>
			<h3><?php echo $row2['name'].' |Category:'.$row['name']?></h3>
	        <?php echo '<span>picturesAll/'.$user_id.'/thumb_'.$row2['filename'].'</span>';?>
			<p> <?php echo $row2['description'];?></p>
		   <?php echo '<a href="#"><img src="picturesAll/'.$user_id.'/thumb_'.$row2['filename'].'" width="125" height="75"/></a></li>';
   	}
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

<?php include "footer.php"?>