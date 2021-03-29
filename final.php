<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession()
?>
<div class="main">
<h1>You are Done !! </h1>
	
	<div class="startTest">
		<h2>Congrats! You have just Completed the Test.</h2>
		<p>Final Score: 
			<?php
				if(isset($_SESSION['score']))
				{
					echo $_SESSION['score'];
					unset($_SESSION['score']);
				}

			?>
		</p>

		<a href="viewAns.php">View Answer</a>
		<a href="starttest.php">Start Again</a>
	</div>

</div>
<?php include 'inc/footer.php'; ?>