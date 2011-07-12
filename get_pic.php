<?php
include "connect.php";
isLogged();
db_connect();
$is_full=0;
$user_id = $_SESSION['user_info']['user_id'];
$pic_id = (int)$_GET['pic'];
$is_full = (int)$_GET['full_size'];	
if($pic_id > 0)
{
   $sql = "SELECT pic.filename FROM pictures as pic, categories as cat WHERE pic.pic_id = 
           '$pic_id' AND pic.cat_id = cat.cat_id AND cat.user_id = '$user_id'";
   $res = mysql_query($sql) or die(mysql_error());
   $row = mysql_fetch_array($res);
   if(strlen($row['filename']) > 0 &&
      file_exists('picturesAll'.DIRECTORY_SEPARATOR.$user_id.DIRECTORY_SEPARATOR.$row['filename']))
   {
      if($is_full)
       {
      	  header("Content-type: image/jpeg");
          echo readfile('picturesAll'.DIRECTORY_SEPARATOR.$user_id.DIRECTORY_SEPARATOR.$row['filename']);
       }
      else 
       {
      	  header("Content-type: image/jpeg");
          echo readfile('picturesAll'.DIRECTORY_SEPARATOR.$user_id.DIRECTORY_SEPARATOR.'thumb_'.$row['filename']);
       }	
   }
}
db_close(db_connect());
?>