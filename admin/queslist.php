<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam = new Exam(); 
?>
<?php
  // Session::checkLogin();
?>

<?php
	if(isset($_GET['delques']))
	{
		$delquesId = $_GET['delques'];
		$delques = $exam->delQuesById($delquesId);
	}

?>

<div class="main">
	<h1>Admin Panel: Question List</h1>
	<?php 
		if(isset($delques))
		{
			echo $delques;
		}
	?>
	
	<div class="quesList">
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="70%">Questions</th>
				<th width="20%">Action</th>
			</tr>
<?php
	$getData = $exam->getAllQues();
	if($getData)
	{
		$i=0;
		while($result=$getData->fetch_assoc())
		{
			$i++;
?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td><?php echo $result['ques']; ?></td>
				<td>
					<a onclick="return confirm('Are you sure to Remove this Question?')" href="?delques=<?php echo $result['quesNo']; ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>

		</table>	

	</div>
	
</div>
<?php include 'inc/footer.php'; ?>