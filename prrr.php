
<?php 
  include "connect.php";
  isLogged();
  db_connect();
  $catname = '';
  $user_id = $_SESSION['user_info']['user_id'];
  /*$sql = "SELECT cat.name,pics.filename FROM categories as cat, pictures as pics WHERE
         user_id = '$user_id' AND pics.cat_id = cat.cat_id ORDER BY cat.cat_id";
  $pics = result_query(query($sql));
  
  foreach ($pics as $v)
  {
  	if($catname != $v['name'])
  	{	
  		echo '<div>'.$v['name'].'</div>';
  	}
  	
  	$catname = $v['name']; 
    echo '<div><img src = "picturesAll/'.$user_id.'/thumb_'.$v['filename'].'"/></div>';
  	
    
  }*/
 //foreach ($r as $values)
  //  echo '<img src="picturesAll/'.$user_id.'/thumb_'.$values['filename'].'" />';
  //$src = "picturesAll/'$user_id'/thumb_'".$value['filename']."'";
  
  
  $sql = "SELECT name,cat_id FROM categories WHERE user_id = '".$_SESSION['user_info']['user_id']."'";
  $query = mysql_query($sql) or die(mysql_error());
  while($row = mysql_fetch_array($query))
   {
   	echo $row['name'];
   	$sql2 = "SELECT filename FROM pictures WHERE cat_id = '".$row['cat_id']."'";
   	$query2 = mysql_query($sql2) or die(mysql_error());
   	while($row2 = mysql_fetch_array($query2))
   	{
   		echo $row2['filename'];
   	}
   	
   }
   
   
   
   
   
					