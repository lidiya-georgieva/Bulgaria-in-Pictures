 <?php 
 include "header.php";
 db_connect();
 $pic_id = (int)$_GET['pic'];
 $user_id = $_SESSION['user_info']['user_id'];
   if($pic_id > 0)
    {
	   $_SESSION['pic_id'] = $pic_id;
	   $sql = "SELECT * FROM pictures WHERE pic_id = '$pic_id'";
	   $res = mysql_query($sql) or die(mysql_error());
	   $row = mysql_fetch_array($res);
	   $sql2 = "SELECT pic_id FROM pictures WHERE cat_id = 
	            (SELECT cat_id FROM pictures WHERE pic_id = '$pic_id') ORDER BY cat_id";
       $res2 = mysql_query($sql2);
       if(mysql_num_rows($res2) > 0)
       {
		     while($row2 = mysql_fetch_array($res2))
		     {
		   	  $pics[] = $row2['pic_id'];
		     }
		     $s = array_search($pic_id, $pics);
		     $prev = 0;
		     $next = 0;
		     if($s > 0)
		     {
		   	   $prev = $pics[($s - 1)];
		     }
			 if($s < count($pics)-1)
			 {
			   $next = $pics[($s + 1)];
			 }   
		     if($prev > 0)
		     {
		   	   echo '<span class = "prev"><a href="browse.php?pic='.$prev.'" >Предишна</a></span>';
		     }
		     if($next > 0)
		     {
		   	   echo '<span class = "next"><a class = "two" href="browse.php?pic='.$next.'" >Следваща</a></span> ';
		     }
	         echo '<div class = "pic">
	                <img class src ="get_pic.php?pic='.$pic_id.'&full_size=1" width = "600" height = "450"/>';
	         echo '<div>'.$row['name'].'</div>';
	         echo '<div>'.$row['description'].'</div></div>';
	 
	         include "picforms.php";
       }
}
include "footer.php";
db_close(db_connect());
?>
