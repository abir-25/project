<?php include 'inc/header.php'; ?>
<?php 
	Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="username" type="text" id="email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" value="Login" id="loginSubmit">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p style="margin-top:15px;">New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display: none">Error! Field Must not be Empty.</span>
	   <span class="disable" style="display: none">Error! User ID Disabled.</span>
	   <span class="error" style="display: none">Error! Email or Password not Matched.</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>