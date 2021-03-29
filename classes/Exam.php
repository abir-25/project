<?php ob_start(); ?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class Exam
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
			
		}



		public function getAllQues() 
		{
			$query = "select * from tbl_ques order by quesNo asc"; 
			$result = $this->db->select($query);
			return $result;
		}


		public function delQuesById($data)
		{
			$tables = array("tbl_ques","tbl_ans");
			foreach ($tables as $table) {
				$del_query = "delete from $table where quesNo='$data'";
				$del_Data = $this->db->delete($del_query);
			}

			if($del_Data)
			{
				$msg = "<span class='success'>Question Removed Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>Question not Removed !!</span>";
				return $msg;
			}
		}

		public function getTotalRow()
		{
			$query = "select * from tbl_ques"; 
			$result = $this->db->select($query);
			$total = $result->num_rows;
			return $total;
		}

		public function addQuestions($data)
		{	
			$quesNo   = mysqli_real_escape_string($this->db->link1, $data['quesNo']);
			$ques 	  = mysqli_real_escape_string($this->db->link1, $data['ques']);
			
			$ans 	  = array();
			$ans[1]   = $data['ans1'];
			$ans[2]   = $data['ans2'];
			$ans[3]   = $data['ans3'];
			$ans[4]   = $data['ans4'];
			$rightAns = $data['rightAns'];

			$query = "insert into tbl_ques(quesNo,ques) values('$quesNo','$ques')";
			$insert_row =  $this->db->insert($query);
			if($insert_row )
			{
				foreach ($ans as $key => $ansName) 
				{
					if($ansName != '')
					{
						if($rightAns == $key)
						{
							$rquery = "insert into tbl_ans(quesNo,rightAns,ans) values('$quesNo','1','$ansName')";
						}
						else
						{
							$rquery = "insert into tbl_ans(quesNo,rightAns,ans) values('$quesNo','0','$ansName')";
						}
						$insert_row_ans =  $this->db->insert($rquery);
						if($insert_row_ans)
						{
							continue;
						}
						else
						{
							die("Error.....");
						}
					}
				}

				$msg = "<span class='success'>Question Added Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>Question not Added !!</span>";
				return $msg;
			}
		}

		public function getQuestion()
		{
			$query = "select * from tbl_ques"; 
			$getData = $this->db->select($query); 
			$result = $getData->fetch_assoc();
			return $result;
		}


		public function getQuestionByNumber($data)
		{
			$query = "select * from tbl_ques where quesNo='$data'"; 
			$getData = $this->db->select($query); 
			$result = $getData->fetch_assoc();
			return $result;
		}

		public function getAnswer($data)
		{
			$query = "select * from tbl_ans where quesNo='$data'"; 
			$getData = $this->db->select($query); 
			return $getData;
		}

	}
	
?>