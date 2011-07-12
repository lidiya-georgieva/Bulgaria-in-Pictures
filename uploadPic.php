<?php
  include "connect.php";
  isLogged();
  $result = 0;
  if($_FILES['file']['tmp_name'])/*do we have an uploaded file*/
  {
  	if($_FILES['file']['size'] <= 4194304 ) /*4mb*/
  	{
  		if(($_FILES['file']['type'] ==  "image/pjpeg") || ($_FILES['file']['type'] ==  "image/gif") 
  		    || ($_FILES['file']['type'] ==  "image/jpeg") || ($_FILES['file']['type'] ==  "image/png"))/*is the file a photo*/
  		    {
  		        if($_POST['select'] > 0)
  		        {
  		        	if(!is_dir('picturesAll'.DIRECTORY_SEPARATOR.$_SESSION['user_info']['user_id']))
  		        	{
  		        		mkdir('picturesAll'.DIRECTORY_SEPARATOR.$_SESSION['user_info']['user_id']);
  		        	}
  		        	$picName = time().'_'.$_FILES['file']['name'];
  		        	$user_id = $_SESSION['user_info']['user_id'];
  		        	$dir = 'picturesAll'.DIRECTORY_SEPARATOR.$user_id;
  		        	if(move_uploaded_file($_FILES['file']['tmp_name'],$dir.DIRECTORY_SEPARATOR.$picName))                    
  		        	{
  		        		$result = 1;
  		        		db_connect();
  		        		$cat_id = (int)$_POST['select'];
  		        		$name = (addslashes(trim($_POST['name'])));
  		        		$description = addslashes($_POST['description']);
  		        		$sql = "INSERT INTO pictures (cat_id, name, filename, description, date) VALUES 
  		        		 ('$cat_id', '$name','$picName','$description','".time()."')";
  		        		mysql_query($sql) or die(mysql_error());
  		        		create_thumbnail($dir.DIRECTORY_SEPARATOR.$picName);
						echo '<script language="javascript">alert("Success!!!");
				           window.location = "addpics.php";</script>';
  		        		//echo "success";
  		        		db_close(db_connect());
  		        		 sleep(1);
  		        	}
  		        	
  		        	else {echo $error['copy'] = "Error while copying the file";}
  		        }
  		        else 
  		        {
  		        	$error['nocat'] = "No category";
  		        }
  		    }
  		else 
  		{
  			$error['photo'] = "The file is not a picture";
  			echo $error['photo'];
  		}
  	}
  	else 
  	{
  		$error['size'] = "File is more than 4mb";
  		echo $error['size'];
  	}
  }
  else 
  {
  	$error['noupload'] = "No uploaded file";
  	echo $error['noupload'];
  }
  
 function create_thumbnail($filename,$th_width = 200)
 {
 	if($_FILES['file']['type'] ==  "image/gif") 
 	{
 		$img = imagecreatefromgif($filename);
 	}
 	if($_FILES['file']['type'] ==  "image/jpeg") 
 	{
 		$img = imagecreatefromjpeg($filename);
 	}
 	if($_FILES['file']['type'] ==  "image/png")
 	{
 		$img = imagecreatefrompng($filename);
 	}
 	$width = imagesx($img);
 	$height = imagesy($img);
 	$new_width = $th_width;
 	$new_height = floor($height * ($th_width / $width));
 	$tmp_img = imagecreatetruecolor($new_width, $new_height);
 	imagecopyresized($tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
 	$folder = dirname($filename);
 	$new_name = 'thumb_'.basename($filename);
 	$where = $folder.DIRECTORY_SEPARATOR.$new_name;
 	//record
 if($_FILES['file']['type'] ==  "image/gif") 
 	{
 		$img = imagegif($tmp_img,$where);
 	}
 	if($_FILES['file']['type'] ==  "image/jpeg") 
 	{
 		$img = imagejpeg($tmp_img,$where);
 	}
 	if($_FILES['file']['type'] ==  "image/png")
 	{
 		$img = imagepng($tmp_img,$where);
 	}
 }?>
  