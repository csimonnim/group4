<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM user WHERE user_id IN (".$item.")";
				if ($conn->query($query) === true){
					checkImage("../imgs/user_uploaded","SELECT image FROM user","image",$conn,"user_uploaded");
					$msg = "User id(s) : ".$item." has been deleted.";
				}else{
					$msg = "Error: ".$query."<br>".$conn->error;
				}
			}else{
				$msg = "No value have been selected.";
				}
		}
}
// save product to database
if(isset($_POST["btnSave"])){
	$id = isset($_POST['txtuserid'])?$_POST['txtuserid']:"";
	$firstname = mysqli_real_escape_string($conn,isset($_POST['txtfirstname'])?$_POST['txtfirstname']:"");
	$lastname = mysqli_real_escape_string($conn,isset($_POST['txtlastname'])?$_POST['txtlastname']:"");
	$username = mysqli_real_escape_string($conn,isset($_POST['txtusername'])?$_POST['txtusername']:"");
	$userrole = isset($_POST['cboRole'])?$_POST['cboRole']:"";
	$dateofbirth = mysqli_real_escape_string($conn,isset($_POST['txtDateofBirth'])?$_POST['txtDateofBirth']:"");
	$password = mysqli_real_escape_string($conn,isset($_POST['txtpassword'])?$_POST['txtpassword']:"");
	$email = mysqli_real_escape_string($conn,isset($_POST['txtemail'])?$_POST['txtemail']:"");
	$phone = mysqli_real_escape_string($conn,isset($_POST['txtphone'])?$_POST['txtphone']:"");
	$join_date = mysqli_real_escape_string($conn,isset($_POST['txtjoindate'])?$_POST['txtjoindate']:"");
	$address = mysqli_real_escape_string($conn,isset($_POST['txtaddress'])?$_POST['txtaddress']:"");
	$image = basename(isset($_FILES["ImageUpload"]["name"])?$_FILES["ImageUpload"]["name"]:"");
	$sql = "INSERT INTO user VALUES (".$id.", '".$firstname."', '".$lastname."','".$username."',".$userrole.",'".$dateofbirth."','".$objencryptpass->encrypt($password)."','".$email."','".$phone."','".$join_date."','".$address."','".$image."')";
	if (file_exists("../imgs/user_uploaded/".$image)){
		$msg = "Image have already nemed in the database.";
	}else{
		if ($conn->query($sql) === TRUE) {
			move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/user_uploaded/".$image);
			checkImage("../imgs/user_uploaded","SELECT image FROM user","image",$conn,"user_uploaded");
			$msg = "".ucfirst($username)." have been added into database.";
		} else {
			$msg = "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtuserid'])?$_POST['txtuserid']:"";
	$firstname = mysqli_real_escape_string($conn,isset($_POST['txtfirstname'])?$_POST['txtfirstname']:"");
	$lastname = mysqli_real_escape_string($conn,isset($_POST['txtlastname'])?$_POST['txtlastname']:"");
	$username = mysqli_real_escape_string($conn,isset($_POST['txtusername'])?$_POST['txtusername']:"");
	$userrole = isset($_POST['cboRole'])?$_POST['cboRole']:"";
	$dateofbirth = mysqli_real_escape_string($conn,isset($_POST['txtDateofBirth'])?$_POST['txtDateofBirth']:"");
	$password = mysqli_real_escape_string($conn,isset($_POST['txtpassword'])?$_POST['txtpassword']:"");
	$email = mysqli_real_escape_string($conn,isset($_POST['txtemail'])?$_POST['txtemail']:"");
	$phone = mysqli_real_escape_string($conn,isset($_POST['txtphone'])?$_POST['txtphone']:"");
	$join_date = mysqli_real_escape_string($conn,isset($_POST['txtjoindate'])?$_POST['txtjoindate']:"");
	$address = mysqli_real_escape_string($conn,isset($_POST['txtaddress'])?$_POST['txtaddress']:"");
	$image = basename(isset($_FILES["ImageUpload"]["name"])?$_FILES["ImageUpload"]["name"]:"");
	$sql = "UPDATE user SET firstname='".$firstname."',lastname='".$lastname."',username='".$username."',role_id=".$userrole.",dob='".$dateofbirth."',password='".$objencryptpass->encrypt($password)."',email='".$email."',phone='".$phone."',join_date='".$join_date."',address='".$address."',image='".$image."' WHERE user_id=".$id."";
	if ($conn->query($sql) === TRUE) {
		move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/user_uploaded/".$image);
		checkImage("../imgs/user_uploaded","SELECT image FROM user","image",$conn,"user_uploaded");
		$msg = "User id ".$id." have been updated.";
	} else {
		$msg = "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>