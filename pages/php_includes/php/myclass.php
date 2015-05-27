<?php
session_start();
include("encryptpass.php");
class myClass extends encryptpass
{
	private $email = array();
	private $password = array();
	function _constructor_login($email,$password,$conn,$LoginType){
		$sql = "SELECT email,password FROM user WHERE role_id = ".$LoginType."";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) { 
				$this->email[] = $row['email'];
				$this->password[] = $this->decrypt($row['password']); 
			}
		} else {
			echo "No value.";
		}
		if(!empty($this->email) && !empty($this->password)){
			if(in_array($email,$this->email) && in_array($password,$this->password)){
				$sql = "SELECT user_id FROM user WHERE email = '".$email."' LIMIT 1";
				$result = $conn->query($sql);
				if($result->num_rows > 0){
					while ($row1 = $result->fetch_assoc()){
						$_SESSION["id"] = $row1['user_id'];
						break;
					}
					if($result){
						header("Location: admin_p.php");
					}
				}
			}else{
				echo "Login Failed.";	
			}
		}
	}
	
}
?>