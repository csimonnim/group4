<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM menu WHERE m_id IN (".$item.")";
				if ($conn->query($query) === true){
					$msg = "Menu id(s) : ".$item." has been deleted.";
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
	$id = isset($_POST['txtmID'])?$_POST['txtmID']:"";
	$name = mysqli_real_escape_string($conn,isset($_POST['txtmenu'])?$_POST['txtmenu']:"");
	$title = mysqli_real_escape_string($conn,isset($_POST['txtTitle'])?$_POST['txtTitle']:"");
	$link = mysqli_real_escape_string($conn,isset($_POST['txtLink'])?$_POST['txtLink']:"");
	$sql = "INSERT INTO menu VALUES (".$id.", '".$name."', '".$title."', '".$link."')";
		if ($conn->query($sql) === TRUE) {
			$msg = "Menu ".$name." have been added.";
		} else {
			$msg = "Error: ". $conn->error;
		}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtmID'])?$_POST['txtmID']:"";
	$name = mysqli_real_escape_string($conn,isset($_POST['txtmenu'])?$_POST['txtmenu']:"");
	$title = mysqli_real_escape_string($conn,isset($_POST['txtTitle'])?$_POST['txtTitle']:"");
	$link = mysqli_real_escape_string($conn,isset($_POST['txtLink'])?$_POST['txtLink']:"");
	$sql = "UPDATE menu SET menu = '".$name."', title = '".$title."', link='".$link."' WHERE m_id = ".$id."";
	if ($conn->query($sql) === TRUE) {
		$msg = "Menu id ".$id." have been updated.";
	} else {
		$msg = "Error: ". $conn->error;
	}
}
?>