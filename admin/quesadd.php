<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exam = new Exam(); 
?>
<?php
  // Session::checkLogin();
?>

<style type="text/css">
	.adminDiv {
	  border: 1px solid #ccc;
	  color: #999;
	  margin: 20px auto 0;
	  padding: 10px;
	  width: 550px;
	  border-radius: 6px;
	}
</style>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$addQues = $exam->addQuestions($_POST);
	}

	$totalRow = $exam->getTotalRow();
	$next = $totalRow+1;
	//echo $next;
?>

<div class="main">
<h1>Admin Panel: Add Question</h1>

<?php
	if(isset($addQues))
	{
		echo $addQues;
	}
?>

<div class="adminDiv">
	<form action="" method="post">
		<table>
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td>
					<input type="text" class="Questext" name="quesNo" value="
						<?php 
							if(isset($next))
							{
								echo $next;
							} 
						?>
					">
				</td>
			</tr>
			<tr>
				<td>Question</td>
				<td>:</td>
				<td><input class="Questext" type="text" name="ques" placeholder="Please Enter Question" required></td>
			</tr>
			<tr>
				<td>Choice One</td>
				<td>:</td>
				<td><input class="Questext" type="text" name="ans1" placeholder="Please Enter Choice One" required></td>
			</tr>
			<tr>
				<td>Choice Two</td>
				<td>:</td>
				<td><input class="Questext" type="text" name="ans2" placeholder="Please Enter Choice Two" required></td>
			</tr>
			<tr>
				<td>Choice Three</td>
				<td>:</td>
				<td><input class="Questext" type="text" name="ans3" placeholder="Please Enter Choice Three" required></td>
			</tr>
			<tr>
				<td>Choice Four</td>
				<td>:</td>
				<td><input class="Questext" type="text" name="ans4" placeholder="Please Enter Choice Four" required></td>
			</tr>

			<tr>
				<td>Correct No</td>
				<td>:</td>
				<td><input type="number" name="rightAns" required></td>
			</tr>

			<tr>
				<td colspan="3" align="center"><input type="submit" value="Add Question"></td>
			</tr>
		</table>

	</form> 
</div>

	
</div>
<?php include 'inc/footer.php'; ?>