
<?php 
  include "connect.php";
  isLogged();
  db_connect();
  $user_id = $_SESSION['user_info']['user_id'];
  $sql = "SELECT cat.name,pics.filename FROM categories as cat, pictures as pics WHERE
         user_id = '$user_id' AND pics.cat_id = cat.cat_id ORDER BY cat.cat_id";
  $pics = result_query(query($sql));
  foreach ($pics as $v)
  {
  	echo '<div><img src = "picturesAll/'.$user_id.'/thumb_'.$v['filename'].'"/></div>';
  	//echo '<div>'.$v['name'].'</div>';
  }
 //foreach ($r as $values)
  //  echo '<img src="picturesAll/'.$user_id.'/thumb_'.$values['filename'].'" />';
  //$src = "picturesAll/'$user_id'/thumb_'".$value['filename']."'";
  ?>