<?php
  function db_connect()
  {
	  $resource = mysql_connect('localhost','root','lida900128') or die("Could not connect".mysql_error());
	  mysql_query('set names utf8',$resource);
	  mysql_select_db('photoalbum',$resource)or die("Could not find database".mysql_error());
	  return $resource;
  }
  function isLogged()
  {
  	    session_start();
	    if ($_SESSION['is_logged']!==true)
		{
		   header("Location: reglog.html");
		   exit;
		}
  }
  function db_close($resource)
  {
  	mysql_close($resource);
  }
  
  function result_query($res)
  {
  	while($row = mysql_fetch_array($res))
  	{
  		$result[] = $row;
  	}
  	return $result;
  }
  
  function query($sql)
  {
  	$res = mysql_query($sql) or die(mysql_error());
  	return $res;	
  }
?>