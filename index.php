<!DOCTYPE>
<html>
<head>
  <title> Register or login </title>
  <link rel = "stylesheet" href = "index.css"/>
  <link rel="stylesheet" media="screen" type="text/css" href="spaceGallery/css/layout.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="spaceGallery/css/spacegallery.css" />
    <link rel="stylesheet" media="screen" type="text/css" href="spaceGallery/css/custom.css" />
    <script type="text/javascript" src="spaceGallery/js/jquery.js"></script>
    <script type="text/javascript" src="spaceGallery/js/eye.js"></script>
    <script type="text/javascript" src="spaceGallery/js/utils.js"></script>
    <script type="text/javascript" src="spaceGallery/js/spacegallery.js"></script>
    <script type="text/javascript" src="spaceGallery/js/layout.js"></script>
<script language="javascript"> 
<!-- 

function checkUsername(username){ 
  document.getElementById('message').innerHTML = 'Checking...'; 
  var xmlhttp=false; 
  try { 
    xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); 
  } catch (e) { 
    try { 
      xmlhttp = new 
      ActiveXObject('Microsoft.XMLHTTP'); 
    } catch (E) { 
      xmlhttp = false; 
    } 
  } 
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') { 
    xmlhttp = new XMLHttpRequest();  
  } 
  xmlhttp.onreadystatechange=function() { 
    if (xmlhttp.readyState==4) { 
      var content = xmlhttp.responseText;
      if( content ){ 
        switch(content){ 
          case "1":document.getElementById('message').innerHTML = "<span style='color:red'>not free!</span>"; break; 
          case "2":document.getElementById('message').innerHTML = "<span style='color:green'>OK</span>"; break; 
		  case "3":document.getElementById('message').innerHTML = "<span style='color:green'>Too short</span>"; break; 
		  case "4":document.getElementById('message').innerHTML = "<span style='color:green'>The username consists only of letters,digits,-,_,.</span>"; break; 
          default :document.getElementById('message').innerHTML = ""; break; 
        } 
      } 
    } 
  } 
  xmlhttp.open('POST', "ajaxcheck.php", true); 
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  
  xmlhttp.send("username=" + username) 
  return; 
} 

function checkPass(password){ 
  document.getElementById('message2').innerHTML = 'Checking...'; 
  var xmlhttp=false; 
  try { 
    xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); 
  } catch (e) { 
    try { 
      xmlhttp = new 
      ActiveXObject('Microsoft.XMLHTTP'); 
    } catch (E) { 
      xmlhttp = false; 
    } 
  } 
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') { 
    xmlhttp = new XMLHttpRequest();
  } 
  
  xmlhttp.onreadystatechange=function() { 
    if (xmlhttp.readyState==4) { 
      var content = xmlhttp.responseText; 
      if( content ){ 
        switch(content){ 
          case "1":document.getElementById('message2').innerHTML = "<span style='color:red'>Too short</span>"; break; 
          case "2":document.getElementById('message2').innerHTML = "<span style='color:green'>Ok</span>"; break; 
          default :document.getElementById('message2').innerHTML = ""; break; 
        } 
      } 
    } 
  } 
  xmlhttp.open('POST', "ajaxcheck.php", true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  
  xmlhttp.send("password=" + password) 
  return; 
} 

-->
</script>
</head>
<body>
   <div id="headerreg">
    <div id = "login">
    <form name = "input" action = "login.php" method = "post" onsubmit = "if(this.username.value == '') {
			alert('Please enter your Name in the form');
			return false;
		  }
		  else if(this.password.value == '') {
			alert('Please enter your Password in the form');
			return false;
		  }">
	  Username: <input type = "text" name = "username" class = "types"/>
	  Password: <input type = "password" name = "password" class = "types"/>
	  
	  <input type = "submit" name = "submit" value = "enter the dark zone" />
	</form>
   </div>
   </div>
   <div id = "register">
   <h2>Регистрирай се</h2>
   <form name = "input" action = "register.php" method = "post" onsubmit="
		  if(this.username.value == '') {
			alert('Please enter your Name in the form');
			return false;
		  }
		  else if(this.password.value == '') {
			alert('Please enter your Password in the form');
			return false;
		  }
		  else if(this.repassword.value == '') {
			alert('Please confirm your Password in the form');
			return false;
		  }
		  else if(this.firstname.value == '') {
			alert('Please enter your firstName in the form');
			return false;
		  }
		  else if(this.lastname.value == '') {
			alert('Please enter your LastName in the form');
			return false;
		  }
		 ">
      Username: <input type = "text" name = "username" class = "types" style = "width:150px;margin-left:55px;" onkeyup="checkUsername(this.value)"/><div id="message"></div> <br/>
	  Password: <input type = "password" name = "password" class = "types" style = "width:150px;margin-left:55px;" onkeyup="checkPass(this.value)"/><div id="message2"></div> <br/>
	  Re-enter password: <input type = "password" name = "repassword" class = "types" style = "width:150px;" onkeyup="checkRepass(this.value)"/><div id="message3"></div> <br/>
	  First name: <input type = "text" name = "firstname" class = "types" style = "width:150px;margin-left:53px;"/><br/>
	  Last name: <input type = "text" name = "lastname" class = "types" style = "width:150px;margin-left:53px;"/><br/>
	  <input type = "hidden" name = "hidd" value = "1"/>
	  <input type = "submit" name = "submit" value = "come to the dark side" />
   </form>
   </div>
   <div style = "width:500px;float:left;">
      <div class="wrapper">
        <h1 id="heading"><i>България в снимки</i></h1>
        <ul class="navigationTabs">
            <li><a href="#about" rel="about">Убедете се сами в красотата на България</a></li>
           
        </ul>
        <div class="tabsContent">
            <div class="tab">
               
				<div id="myGallery" class="spacegallery">
					<img src="spaceGallery/images/bw1.jpg" alt="" />
					<img src="spaceGallery/images/lights3.jpg" alt="" />
					<img src="spaceGallery/images/bw2.jpg" alt="" />
					<img src="spaceGallery/images/lights2.jpg" alt="" />
					<img src="spaceGallery/images/bw1.jpg" alt="" />
					<img src="spaceGallery/images/lights1.jpg" alt="" />
				</div>
            </div>
            
        </div>
    </div>
   </div>
   
  
</body>
</html>