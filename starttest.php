<?php include 'inc/header.php'; ?>
<?php
	Session::checkSession();
	$question = $exam->getQuestion();
	$total = $exam->getTotalRow();
?>
<div class="main">
<h1>Welcome to Online Exam</h1>
	
	<div class="startTest">
		<h2>Test Your Knowledge</h2>
		<p>This is the Multiple Choice Quiz to Test your Knowledge.</p>

		<ul>
			<li><strong>Number of Questions: </strong><?php echo $total; ?></li>
			<li><strong>Questions Type: </strong>Multiple Choice</li>
		</ul>  
		<a href="test.php?q=<?php echo $question['quesNo']; ?>">Start Test</a>
	</div>
	
  </div>
<?php include 'inc/footer.php'; ?>