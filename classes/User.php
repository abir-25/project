<?php ob_start(); ?>
<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');

	class User
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
			
		}



		public function getAllUser() 
		{
			$query = "select * from tbl_user order by userId desc"; 
			$result = $this->db->select($query);
			return $result;
		}


		public function getUserData($data){
			$query = "select * from tbl_user where userId = '$data'"; 
			$result = $this->db->select($query);
			return $result;
		}	

		public function disableUser($data)
		{
			$query = "update tbl_user set status='1' where userId='$data'";
			$update_row = $this->db->update($query);

			if($update_row)
			{
				$msg = "<span class='success'>User Disabled Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>User not Disabled !!</span>";
				return $msg;
			}
			
		}

		public function enableUser($data)
		{
			$query = "update tbl_user set status='0' where userId='$data'";
			$update_row = $this->db->update($query);

			if($update_row)
			{
				$msg = "<span class='success'>User Enabled Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>User not Enabled !!</span>";
				return $msg;
			}
			
		}

		public function deleteUser($data)
		{
			$query = "delete from tbl_user where userId='$data'";
			$del_Data = $this->db->delete($query);

			if($del_Data)
			{
				$msg = "<span class='success'>User Removed Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>User not Removed !!</span>";
				return $msg;
			}
			
		}

		public function userRegistration($name, $username, $password, $email)
		{
			$name 	  = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$password = $this->fm->validation($password);
			$email    = $this->fm->validation($email);

			$name 	  = mysqli_real_escape_string($this->db->link1, $name);
			$username = mysqli_real_escape_string($this->db->link1, $username);
			$password = mysqli_real_escape_string($this->db->link1, $password);
			$email 	  = mysqli_real_escape_string($this->db->link1, $email);
			

			if($name == "" || $username == "" || $password == "" || $email == "") 
			{
				echo "<span class='error'>Error! Field Must not be Empty !!</span>";
				exit();
			}
			else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			{
				echo "<span class='error'>Error! Invalid Email Address !!</span>";
				exit();
			}
			else
			{
				$chkQuery = "Select * from tbl_user where email = '$email'";
				$chkResult = $this->db->select($chkQuery);
				if($chkResult != false)
				{
					echo "<span class='error'>Error! Email Address Already Exists !!</span>";
					exit();
				}
				else
				{
					$password = md5($password);
					$query = "insert into tbl_user(name,username,password,email) values('$name','$username','$password','$email')";
					$insert_row =  $this->db->insert($query);
					if($insert_row)
					{
						echo "<span class='success'>Registration Completed Successfully !!</span>";
						exit();
					}
					else
					{
						echo "<span class='error'>Error! Registration doesn't Complete !!</span>";
						exit();
					}
				}
			}
		}


		public function userLogin($email, $password)
		{
			$email    = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$email 	  = mysqli_real_escape_string($this->db->link1, $email);
			$password = mysqli_real_escape_string($this->db->link1, $password);

			if($password == "" || $email == "") 
			{
				echo "empty";
				exit();
			}
			else
			{
				$password = md5($password);
				$query = "select * from tbl_user where email='$email' and password='$password'"; 
				$result = $this->db->select($query);

				if($result != false)
				{
					$value = $result->fetch_assoc();
					if($value['status'] == '1')
					{
						echo "disable";
						exit();
					}
					else
					{
						Session::init();
						Session::set("login", true);
						Session::set("userId", $value['userId']);
						Session::set("userName", $value['username']);
						Session::set("name", $value['name']);
						
						//header("Location:index.php");
					}
				}
				else
				{
					echo "error";
					exit();
				}
			}

		}

		public function updateUerData($userId, $data)
		{
			$name     = $this->fm->validation($data['name']);
			$username = $this->fm->validation($data['username']);
			$email    = $this->fm->validation($data['email']);

			$name 	  = mysqli_real_escape_string($this->db->link1, $name);
			$username = mysqli_real_escape_string($this->db->link1, $username);
			$email 	  = mysqli_real_escape_string($this->db->link1, $email);
			
			$query = "update tbl_user set name='$name', username='$username', email='$email' where userId='$userId'";
			$update_row = $this->db->update($query);

			if($update_row)
			{
				Session::init();
				Session::set("login", true);
				Session::set("userName", $username);
				Session::set("name", $name);
						
				$msg = "<span class='success'>User Data Updated Successfully !!</span>";
				return $msg;
			}
			else
			{
				$msg = "<span class='error'>User Data not Updated !!</span>";
				return $msg;
			}
		}
	}
	
?>