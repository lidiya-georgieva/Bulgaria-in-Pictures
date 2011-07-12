<?php 
include "header.php";
?>
       <div class = "showPics">
       <?php
        db_connect();
		  echo '<div class="profile"><i>Give a shot!</i></div>';
	    $sql = "SELECT * FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
	    $query = mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($query) > 0) {
		  while($row = mysql_fetch_array($query))
		  {
		  	 $sql2 = "SELECT pic_id FROM pictures WHERE cat_id = '".$row['cat_id']."'";
	         $query2 = mysql_query($sql2) or die(mysql_error());
	         $row2 = mysql_fetch_array($query2);
	         if($row2['pic_id'] > 0)
		       echo '<a href="browse.php?pic='.$row2['pic_id'].'" class = "names">'.$row['name'].'</a><br/>';
		     else echo '<div class="names">'.$row['name'].'</div>';
		     
         }
		}
	 ?>
		 
       </div>
       <div class= "addpics">
        <form name = "input" method = "post" enctype = "multipart/form-data" action = "uploadPic.php" onsubmit="
		  if(this.file.value == '') {
			alert('Please insert a File in the form');
			return false;
		  }
		 ">
		 Category: <select name = "select">
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
         File: <input type= "file" name = "file" /><br/>
         Name: <input type = "text" name = "name"/><br/>
         Description: <textarea name = "description"></textarea><br/>
          <input type = "submit" name = "submit" value = "Add pictures"/>
        </form>
       </div>
<?php include "footer.php";?>