<?php
// function to delete image when its name doesn't in the database
function checkImage($path,$query,$name,$conn,$folder){
	$result = $conn->query($query);					
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$files[] = $row[$name];
		}
	}
	$dir = $path;
	$dot = array(".","..","default");
	if(is_dir($dir)){
		if($rdir = opendir($dir)){
			while (false !== ($filename = readdir($rdir))) {
				if($files > 0){
					if(!in_array($filename,$dot)){
						if(in_array($filename,$files)=== false){
							unlink('..\\imgs\\'.$folder.'\\'.$filename);
						}
					}
				}
			}
			closedir($rdir);
		}
	}
}

// function to check session on admin page from login page
$user = array();
function checkLogin($conn){
	if(!isset($_SESSION['id']) != ""){header("Location: login.php");}else{
		$sql = "SELECT * FROM user AS u INNER JOIN role AS r ON u.role_id = r.role_id WHERE u.user_id = ".$_SESSION['id']." LIMIT 1";
		$result = $conn->query($sql);
					if($result->num_rows > 0){
							while ($row = $result->fetch_assoc()){
								$GLOBALS['user'][] = $row;
							}		
					}
	}
}

function Getdates(){
 $date = date("m/d/Y");	
 return $date;
}
?>