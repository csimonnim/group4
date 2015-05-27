<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM category WHERE cate_id IN (".$item.")";
				if ($conn->query($query) === true){
					checkImage("../imgs/cate_uploaded","SELECT cate_image FROM category","cate_image",$conn,"cate_uploaded");
					$msg = "Brand id(s) : ".$item." has been deleted.";
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
	$id = isset($_POST['txtc_id'])?$_POST['txtc_id']:"";
	$cname = mysqli_real_escape_string($conn,isset($_POST['txtc_name'])?$_POST['txtc_name']:"");
	$image = basename(isset($_FILES["ImageUpload"]["name"])?$_FILES["ImageUpload"]["name"]:"");
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");

	$sql = "INSERT INTO category VALUES (".$id.", '".$cname."', '".$image."','".$desc."')";
	if (file_exists("../imgs/cate_uploaded/".$image)){
		$msg = "Image have already nemed in the database.";
	}else{
		if ($conn->query($sql) === TRUE) {
			move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/cate_uploaded/".$image);
			checkImage("../imgs/cate_uploaded","SELECT cate_image FROM category","cate_image",$conn,"cate_uploaded");
			$msg = "Category ".$cname." have been added into stock.";
		} else {
			$msg = "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtc_id'])?$_POST['txtc_id']:"";
	$cname = mysqli_real_escape_string($conn,isset($_POST['txtc_name'])?$_POST['txtc_name']:"");
	$image = basename($_FILES["ImageUpload"]["name"]);
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");
	$sql = "UPDATE category SET cate_name = '".$cname."', cate_image = '".$image."', c_description = '".$desc."' WHERE cate_id = ".$id."";
	if ($conn->query($sql) === TRUE) {
		move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/cate_uploaded/".$image);
		checkImage("../imgs/cate_uploaded","SELECT cate_image FROM category","cate_image",$conn,"cate_uploaded");
		$msg = "Category id ".$id." have been updated.";
	} else {
		$msg = "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>