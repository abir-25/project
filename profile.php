<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$userId = Session::get("userId");
?>
<style type="text/css">
	.profile {
	  border: 1px solid #999999;
	  margin: 20px auto;
	  padding: 30px;
	  width: 485px;
	  padding-left: 114px;
	}

	input[type="text"] {
	  width: 300px;
	}

</style>

<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$updateUser = $user->updateUerData($userId, $_POST);
	}
?>

<div class="main">
<h1>Your Profile</h1>
<div class="profile">
	<?php
		if(isset($updateUser))
		{
			echo $updateUser;
		}
	?>
	<form action="" method="post">
		<table class="tbl"> 
<?php
	$userData = $user->getUserData($userId);
	if($userData)
	{
		while($result = $userData->fetch_assoc())  //ekta row anar somoy while use na korleo hoy..
		{
?>   

			 <tr>
			   <td>Name</td>
			   <td><input name="name" type="text" value="<?php echo $result['name']; ?>"></td>
			 </tr>
			  <tr>
			   <td>Username</td>
			   <td><input name="username" type="text" value="<?php echo $result['username']; ?>"></td>
			 </tr>
		
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="text" value="<?php echo $result['email']; ?>"></td>
			 </tr>

			  <tr>
			  	<td></td>
			    <td><input type="submit" name="login" value="Update">
			    </td>
			 </tr>
<?php } } ?>
	   </table>
	</form>
</div>

</div>
<?php include 'inc/footer.php'; ?>