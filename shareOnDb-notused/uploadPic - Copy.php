<?php
  include "connect.php";
  isLogged();
  if($_FILES['file']['tmp_name'])/*do we have an uploaded file*/
  {
  	if($_FILES['file']['size'] <= 2097152) /*2mb*/
  	{
  		if(($_FILES['file']['type'] ==  "image/pjpeg") || ($_FILES['file']['type'] ==  "image/gif") 
  		    || ($_FILES['file']['type'] ==  "image/jpeg") || ($_FILES['file']['type'] ==  "image/png"))/*is the file a photo*/
  		    {
  		    $fileName = $_FILES['file']['name'];
			$tmpName  = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileType = $_FILES['file']['type'];

				$fp      = fopen($tmpName, 'r');
				$content = fread($fp, filesize($tmpName));
				$content = addslashes($content);
				fclose($fp);
				if(!get_magic_quotes_gpc())
				{
				    $fileName = addslashes($_FILES['file']['name']);
				}
                 db_connect();
                 $name = addslashes(trim($_POST['name']));
                 $description = addslashes($_POST['description']);
                 $cat_id = (int)$_POST['select'];
                 $sql = "INSERT INTO pictures (cat_id,name,description,date,filename, size, type, content) VALUES ('$cat_id','$name','$description','".time()."','$fileName', '$fileSize', '$fileType', '$content')";	
                 mysql_query($sql) or die(mysql_error()); 

                 echo "<br>File $fileName uploaded<br>";
  		    }
  		else 
  		{
  			$error['photo'] = "The file is not a picture";
  			echo $error['photo'];
  		}
  	}
  	else 
  	{
  		$error['size'] = "File is more than 2mb";
  		echo $error['size'];
  	}
  }
  else 
  {
  	$error['noupload'] = "No uploaded file";
  	echo $error['noupload'];
  }