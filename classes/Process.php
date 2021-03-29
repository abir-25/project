<?php ob_start(); ?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	Session::init();
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Process
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
			
		}


		public function processData($data)
		{
			$selectedAns = $this->fm->validation($data['ans']);
			$number 	 = $this->fm->validation($data['number']);
			
			$selectedAns = mysqli_real_escape_string($this->db->link1, $selectedAns);
			$number	     = mysqli_real_escape_string($this->db->link1, $number);

			$next 		 = $number+1;

			if(!isset($_SESSION['score']))
			{
				$_SESSION['score'] = '0';
			}

			$total = $this->getTotal();
			$right = $this->rightAnswer($number);

			if($right == $selectedAns)
			{
				$_SESSION['score']++; 
			}

			if($number == $total)
			{
				header("Location:final.php");
				exit();
			}
			else
			{
				header("Location:test.php?q=".$next);
			}
		}
		
		private function getTotal()
		{
			$query = "select * from tbl_ques"; 
			$result = $this->db->select($query);
			$total = $result->num_rows;
			return $total;
		}

		private function rightAnswer($data)
		{
			$query = "select * from tbl_ans where quesNo = '$data' and rightAns = '1'"; 
			$getData = $this->db->select($query)->fetch_assoc();
			$result = $getData['id'];
			return $result;
		}


	}
	
?>