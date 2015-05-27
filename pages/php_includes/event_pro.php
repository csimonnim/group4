<?php 
$msg = "";
$item = "";
// delete product
$checkList = array(isset($_POST['action_check'])?$_POST['action_check']:"");
if (isset($_POST['btnDelete'])){
		foreach ($checkList as $check){
			if (!empty($check)){
				$item = implode(",",$check);
				$query = "DELETE FROM product WHERE p_id IN (".$item.")";
				if ($conn->query($query) === true){
					checkImage("../imgs/uploaded","SELECT p_image FROM product","p_image",$conn,"uploaded");
					$msg = "Product id(s) : ".$item." has been deleted.";
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
$id = isset($_POST['txtPro_id'])?$_POST['txtPro_id']:"";
$brand = isset($_POST['cboBrand'])?$_POST['cboBrand']:"";
$pname = mysqli_real_escape_string($conn,isset($_POST['txtPro_name'])?$_POST['txtPro_name']:"");
$cate = isset($_POST['cboCate'])?$_POST['cboCate']:"";
$quantity = mysqli_real_escape_string($conn,isset($_POST['txtQuantity'])?$_POST['txtQuantity']:"");
$unitp = mysqli_real_escape_string($conn,isset($_POST['txtUnitprice'])?$_POST['txtUnitprice']:"");
$unitins = mysqli_real_escape_string($conn,isset($_POST['txtUnitInstock'])?$_POST['txtUnitInstock']:"");
$image = basename($_FILES["ImageUpload"]["name"]);
$discountinued = isset($_POST['cboDiscountinued'])?$_POST['cboDiscountinued']:"";
$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");

$sql = "INSERT INTO product VALUES (".$id.", ".$brand.", '".$pname."',".$cate.",".$quantity.",".$unitp.",".$unitins.",'".$image."',".$discountinued.",'".$desc."')";
	if (file_exists("../imgs/uploaded/".$image)){
		$msg = "Image have already nemed in the database.";
	}else{
		if ($conn->query($sql) === TRUE) {
			move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/uploaded/".$image);
			checkImage("../imgs/uploaded","SELECT p_image FROM product","p_image",$conn,"uploaded");
			$msg = "Product ".$pname." have been added into stock.";
		} else {
			$msg = "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
// write to update product	
if (isset($_POST["btnUpdate"])){
	$id = isset($_POST['txtPro_id'])?$_POST['txtPro_id']:"";
	$brand = isset($_POST['cboBrand'])?$_POST['cboBrand']:"";
	$pname = mysqli_real_escape_string($conn,isset($_POST['txtPro_name'])?$_POST['txtPro_name']:"");
	$cate = isset($_POST['cboCate'])?$_POST['cboCate']:"";
	$quantity = mysqli_real_escape_string($conn,isset($_POST['txtQuantity'])?$_POST['txtQuantity']:"");
	$unitp = mysqli_real_escape_string($conn,isset($_POST['txtUnitprice'])?$_POST['txtUnitprice']:"");
	$unitins = mysqli_real_escape_string($conn,isset($_POST['txtUnitInstock'])?$_POST['txtUnitInstock']:"");
	$image = basename($_FILES["ImageUpload"]["name"]);
	$discountinued = isset($_POST['cboDiscountinued'])?$_POST['cboDiscountinued']:"";
	$desc = mysqli_real_escape_string($conn,isset($_POST['txtDescription'])?$_POST['txtDescription']:"");
	$sql = "UPDATE product SET brand_id = ".$brand.", p_name = '".$pname."', cate_id = ".$cate.", quantity = ".$quantity.", unitprice = ".$unitp.", unitinstock = ".$unitins.",p_image = '".$image."',discountinued = ".$discountinued.", p_description = '".$desc."' WHERE p_id = ".$id."";
	if ($conn->query($sql) === TRUE) {
		move_uploaded_file($_FILES["ImageUpload"]["tmp_name"],"../imgs/uploaded/".$image);
		checkImage("../imgs/uploaded","SELECT p_image FROM product","p_image",$conn,"uploaded");
		$msg = "Product id ".$id." have been updated.";
	} else {
		$msg = "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>