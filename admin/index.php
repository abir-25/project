<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>

<style type="text/css">
	.adminDiv {
	  border: 1px solid #ccc;
	  color: #999;
	  margin: 98px auto 0;
	  padding: 20px;
	  width: 500px;
	  border-radius: 6px;
	}
</style>


<div class="main">
<h1>Admin Panel</h1>

<div class="adminDiv">
	<h2>Welcome to Control Admin Panel</h2>
	<p>You can manage your user and Exam contol from here..</p>
</div>

	
</div>
<?php include 'inc/footer.php'; ?>