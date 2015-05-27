<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM brand WHERE brand_id IN (".$item.")";
				if ($conn->query($query) === true){
					checkImage("../imgs/brand_uploaded","SELECT brand_image FROM brand","brand_image",$conn,"brand_uploaded");
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
	$id = isset($_POST['txtb_id'])?$_POST['txtb_id']:"";
	$bname = mysqli_real_escape_string($conn,isset($_POST['txtb_name'])?$_POST['txtb_name']:"");
	$image = basename(isset($_FILES["ImageUpload"]["name"])?$_FILES["ImageUpload"]["name"]:"");
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");

	$sql = "INSERT INTO brand VALUES (".$id.", '".$bname."', '".$image."','".$desc."')";
	if (file_exists("../imgs/brand_uploaded/".$image)){
		$msg = "Image have already nemed in the database.";
	}else{
		if ($conn->query($sql) === TRUE) {
			move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/brand_uploaded/".$image);
			checkImage("../imgs/brand_uploaded","SELECT brand_image FROM brand","brand_image",$conn,"brand_uploaded");
			$msg = "Brand ".$bname." have been added into stock.";
		} else {
			$msg = "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtb_id'])?$_POST['txtb_id']:"";
	$bname = mysqli_real_escape_string($conn,isset($_POST['txtb_name'])?$_POST['txtb_name']:"");
	$image = basename($_FILES["ImageUpload"]["name"]);
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");
	$sql = "UPDATE brand SET brand = '".$bname."', brand_image = '".$image."', description = '".$desc."' WHERE brand_id = ".$id."";
	if ($conn->query($sql) === TRUE) {
		move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/brand_uploaded/".$image);
		checkImage("../imgs/brand_uploaded","SELECT brand_image FROM brand","brand_image",$conn,"brand_uploaded");
		$msg = "Brand id ".$id." have been updated.";
	} else {
		$msg = "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>