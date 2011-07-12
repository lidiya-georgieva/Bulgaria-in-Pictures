<!DOCTYPE>
<html>
<head>
 <title>Bulgaria in Pictures </title>
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
  $sql = "SELECT name,cat_id FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
  $user_id = $_SESSION['user_info']['user_id'];
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
   	    <div class="catSettings">
   	    <form name="input" method = "post" action = "addcategories.php" onsubmit="
		   if(this.name.value == '') {
			alert('Please enter your Name in the form');
		    return false;
		   }">
    Name: <input type= "text" name = "name" />
          <input type = "hidden" name = "hid" value = "1"/>
          <input type = "submit" name = "submit" value = "Add category"/>
</form>

<form name ="input" method="post" action="deleteCategory.php">
	<fieldset style="width:200px;padding-left:120px;">
	    <legend><b>Edit Category</b></legend>
		Category: <select name = "select1">
				  <?php
				    $sql = "SELECT * FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
	                $query = mysql_query($sql) or die(mysql_error());
	                if(mysql_num_rows($query) > 0)
	                 {
						 while($row = mysql_fetch_array($query))
					     {
					     	echo '<option value = '.$row['cat_id'].'>'.$row['name'].'</option>';
					     }	
	                  }	
			       ?>
		          </select><br/>
				  <input type="submit" name="submit" value="Delete" />					
</form>
<form name ="input" method="post" action="changeCatName.php">
	  Category: <select name = "select2">
	<?php
	$sql = "SELECT * FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
	$query = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($query) > 0) 
	{
	   while($row = mysql_fetch_array($query))
	   {
	   	  echo '<option value = '.$row['cat_id'].'>'.$row['name'].'</option>';
	   }	
	 }	
	 ?>
		       </select><br/>
	  New name: <input type = "text" name = "newname" />
		        <input type="submit" name="submit1" value="Rename" />
	</fieldset>
</form>
</div>
<?php include "footer.php"?>