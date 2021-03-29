<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');
	$user = new User(); 
?>
<?php
  // Session::checkLogin();
?>

<?php
	if(isset($_GET['dis']))
	{
		$disId = $_GET['dis'];
		$dblUser = $user->disableUser($disId);
	}

	if(isset($_GET['ena']))
	{
		$enaId = $_GET['ena'];
		$eblUser = $user->enableUser($enaId);
	}

	if(isset($_GET['del']))
	{
		$delId = $_GET['del'];
		$delUser = $user->deleteUser($delId);
	}
?>

<div class="main">
	<h1>Admin Panel: Manage Users</h1>
	<?php 
		if(isset($dblUser))
		{
			echo $dblUser;
		}
	?>
	<?php 
		if(isset($eblUser))
		{
			echo $eblUser;
		}
	?>

	<?php 
		if(isset($delUser))
		{
			echo $delUser;
		}
	?>
	<div class="manageUser">
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
<?php
	$userData = $user->getAllUser();
	if($userData)
	{
		$i=0;
		while($result=$userData->fetch_assoc())
		{
			$i++;
?>
			<tr>
				<td>
					<?php 
						if($result['status'] == '1')
						{ 
							echo "<span class='error'>".$i."</span>";
						}
						else
						{
							echo $i;
						}
				 	?>	
				 </td>
				<td><?php echo $result['name']; ?></td>
				<td><?php echo $result['username']; ?></td>
				<td><?php echo $result['email']; ?></td>
				<td>
					<?php if($result['status'] == '0') { ?>
						<a onclick="return confirm('Are you sure to Disable this user?')" href="?dis=<?php echo $result['userId']; ?>">Disable</a>

					<?php } else { ?>
						<a onclick="return confirm('Are you sure to Enable this user?')" href="?ena=<?php echo $result['userId']; ?>">Enable</a>

					 <?php } ?>
					 || 
					<a onclick="return confirm('Are you sure to Remove this user?')" href="?del=<?php echo $result['userId']; ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>

		</table>	

	</div>
	
</div>
<?php include 'inc/footer.php'; ?>