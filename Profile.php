<?php 
include "header.php";
echo '<div class="profile"><i>Username: </i>'
       .$_SESSION['user_info']['username'].
      '<br/><i>Name: </i>'.$_SESSION['user_info']['name'].' '
        .$_SESSION['user_info']['lastname'].'<br/><i>Date reg: </i>'.date("F d Y",$_SESSION['user_info']['date']).'</div><br/>';
		?>
		   <form name ="input" method="post" action="deleteMe.php">
		     <input type = "submit" name = "submit" value = "Delete yourself"/>
		 </form>
		 <form name ="input" method="post" action="logout.php">
		     <input type = "submit" name = "submit" value = "Logout"/>
		 </form>
	
        <form name ="input" method="post" action="changePassword.php">
						<fieldset style="width:150px;padding-left:170px;padding-right:150px;;float:left;">
							<legend><b>Change Password</b></legend>
							<p>New Password:<br/><input type="password" name="newpassword" ></p>
							<p>Confirm Password:<br/><input type="password" name="renewpassword"  ></p>
							<p>Old Password:<br/><input type="password" name="password" ></p>
							
							<input type="submit" name="submit1" value="Change"  style="height: 35px; width: 70px"/>
						</fieldset>
		</form>
		 <form name ="input" method="post" action="changeFirstname.php">
						<fieldset style="width:150px;padding-left:170px;padding-right:150px;;float:left;">
							<legend><b>Change first name</b></legend>
							<p>New Name:<br/><input type="text" name="newname" ></p>
							<p>Password:<br/><input type="password" name="password" ></p>
							
							<input type="submit" name="submit2" value="Change"  style="height: 35px; width: 70px"/>
						</fieldset>
		</form>
		 <form name ="input" method="post" action="changeLastname.php">
						<fieldset style="width:140px;padding-left:190px;padding-right:140px;float:left;margin-left:5px;	">
							<legend><b>Change last name</b></legend>
							<p>New Last Name:<br/><input type="text" name="newlastname" ></p>
							<p>Password:<br/><input type="password" name="password" ></p>
							
							<input type="submit" name="submit3" value="Change"  style="height: 35px; width: 70px"/>
						</fieldset>
		</form>
		
<?php include "footer.php";?>