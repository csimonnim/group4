<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM role WHERE role_id IN (".$item.")";
				if ($conn->query($query) === true){
					$msg = "Role id(s) : ".$item." has been deleted.";
				}else{
					$msg = "Error: ".$conn->error;
				}
			}else{
				$msg = "No value have been selected.";
				}
		}
}
// save product to database
if(isset($_POST["btnSave"])){
	$id = isset($_POST['txtRoleid'])?$_POST['txtRoleid']:"";
	$name = mysqli_real_escape_string($conn,isset($_POST['txtRolename'])?$_POST['txtRolename']:"");
	$file = mysqli_real_escape_string($conn,isset($_POST['txtLoginfile'])?$_POST['txtLoginfile']:"");
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");
	$sql = "INSERT INTO role VALUES (".$id.", '".$name."', '".$file."', '".$desc."')";
		if ($conn->query($sql) === TRUE) {
			$msg = "Role ".$name." have been added.";
		} else {
			$msg = "Error: ". $conn->error;
		}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtRoleid'])?$_POST['txtRoleid']:"";
	$name = mysqli_real_escape_string($conn,isset($_POST['txtRolename'])?$_POST['txtRolename']:"");
	$file = mysqli_real_escape_string($conn,isset($_POST['txtLoginfile'])?$_POST['txtLoginfile']:"");
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");
	$sql = "UPDATE role SET user_role = '".$name."',role_file='".$file."', description = '".$desc."' WHERE role_id = ".$id."";
	if ($conn->query($sql) === TRUE) {
		$msg = "Role id ".$id." have been updated.";
	} else {
		$msg = "Error: ". $conn->error;
	}
}
?>