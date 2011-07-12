<?php 
include "header.php";
?>
<div style = "margin-left:620px;margin-top:20px;">
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
				   db_connect();
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
<?php
include "footer.php";
?>