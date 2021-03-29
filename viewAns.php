<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$total = $exam->getTotalRow();
?>

<div class="main">
<h1>All Question and Answer: <?php echo $total; ?></h1>
	<div class="test">

		<table> 
			<?php
				$getQues = $exam->getAllQues();
				if($getQues)
				{
					while($question = $getQues->fetch_assoc())
					{ ?>

		
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>


			<?php
				$number = $question['quesNo'];
				$answer = $exam->getAnswer($number);
				if($answer)
				{
					while($result = $answer->fetch_assoc())
					{ ?>

						<tr>
							<td>
								 <input type="radio"/>
								 <?php 
								 	if($result['rightAns'] == '1')
								 	{
								 		echo "<span style='color:blue'>".$result['ans']."</span>";
								 	}
								 	else
								 	{
								 		echo $result['ans']; 
								 	}
								 	
								 ?>
							</td>
						</tr>
				
				<?php } } ?>

					<tr>
						<td style="visibility: hidden;">dasd</td>
					</tr>

			<?php } } ?>
			

			

			
		</table>
		<a href="starttest.php">Start Again</a>
	</form>
	
</div>
 </div>
<?php include 'inc/footer.php'; ?>