<?php
include "header.php";
 db_connect();
  $catname = '';
  $user_id = $_SESSION['user_info']['user_id'];
  $sql = "SELECT cat.name,pics.filename,pics.pic_id FROM categories as cat, pictures as pics WHERE
         user_id = '$user_id' AND pics.cat_id = cat.cat_id ORDER BY cat.cat_id";
  $pic = result_query(query($sql));
  echo '<div class = "leftbar">';
  echo '<div style="margin-top:0px;">'.$pic[0][0].'</div>';
  $catname = $pic[0][0]; 
  foreach ($pic as $v)
  {
  	if($catname != $v['name'])
  	{	
  		echo '<div>'.$v['name'].'</div>';
  	}
  	
  	$catname = $v['name']; 
  	 echo '<div style="margin:5px;float:left"><a href="browse.php?pic='.$v['pic_id'].'"><img style = "float:left;" src ="get_pic.php?pic='.$v['pic_id'].'&full_size=0"/></a></div>';
   
  }
  echo '</div>';
  ?>
<div class = "sidebar">
<div style = "margin-left:620px;">
<form name="input" method = "post" action = "addcategories.php" onsubmit="
		   if(this.name.value == '') {
			alert('Please enter your Name in the form');
		    return false;
		   }">
    Name: <input type= "text" name = "name" />
          <input type = "hidden" name = "hid" value = "1"/>
          <input type = "submit" name = "submit" value = "Add category"/>
</form>
</div>
<form name ="input" method="post" action="deleteCategory.php">
	<fieldset style="width:200px;float:right;padding-left:120px;">
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
<?php 
  include "footer.php";
  db_close(db_connect());
 ?>
   
   
   
					