<?php include("../connect_db/connect.php");
$conn = connect_db();
$LoginType = isset($_GET["lgtype"])?$_GET["lgtype"]:"1";
include("../pages/php_includes/php/myclass.php");

$objMyclass = new myClass();
if(isset($_POST['btnLogin'])){
	$txtEmail = mysqli_escape_string($conn,isset($_POST['txtEmail'])?$_POST['txtEmail']:"");
	$txtPassword = mysqli_escape_string($conn,isset($_POST['txtPassword'])?$_POST['txtPassword']:"");
	$objMyclass->_constructor_login($txtEmail,$txtPassword,$conn,$LoginType);
}
if(isset($_POST['btnCancel'])){header("Location: ../../group4/");}
 ?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/admin.ico" />
	<title>GROUP 4 - Login page</title>
    <link rel="stylesheet" type="text/css" charset="utf-8" href="../css/login.css" />
</head>
<body">
	<!--container--><div id="container" style="margin:0px -8px;">
    <!-- switch login type --><div style="text-align:right; height:80px; background:#CCC; margin-top:-10px; border:0px solid #F00; width:100%;">
    	<div style="float:right; margin:30px 60px 0px 0px; border:0px solid #006;">
         <?php
		$typeClass = 'typeLink';
		$sql = "SELECT * FROM role ORDER BY role_id ASC";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if($LoginType == $row['role_id']){
        			$typeClass = "typeLink_active";
        		}else{
					$typeClass = 'typeLink';
				}
		?>
        <div class="type">
        <a href="?lgtype=<?php echo $row['role_id'];?>" class="<?php echo trim($typeClass); ?>" title="<?php echo $row['user_role'];?>"><?php echo $row['user_role'];?></a>
        </div>
		<?php
        }
		}
		$conn->close();
		?>
        </div>
    <!-- end switch login type --></div>
        <!--inner--><div class="inner">
            <!-- body page --><div style="float:left; width:1050px;">	
            	<!-- content section --><div style="float:left; border:0px solid #333; width:1050px;">
                	<!-- title login --><div class="title_login">
                    <span style="color:#09F; font-size:24px;">Login</span>
                    <!-- end title login --></div>
                    <!-- form login --><div class="form_login">
                        <?php
							include("admin.php");	
						?>
                        <!-- control register & forgot pass --><div style="width:50%; margin:0px auto; margin-top:40px;">
                        	<!-- register --><div style="float:left;border-right:1px solid #09F; width:49.30%;text-align:center;">
                            	<a href="#" class="reg_for" title="Register">Register</a>
                            <!-- end register --></div>
                            <!-- forgot password --><div style="float:right; width:49.25%;text-align:center;">
                            	<a href="#" class="reg_for" title="Forgot password.">Forgot Password</a>
                            <!-- end forgot password --></div>
                        <!-- end control register & forgot pass --></div>
                    <!-- end form login --></div>
                    <!-- copy right --><div style="text-align:center; margin-top:50px;">
                    <span style="color:#999;">Copyright © <?php echo Date("Y"); ?> GROUP 4. All Rights Reserved.</span>
                    <!-- copy right --></div>
                <!-- end content section --></div>
        	<!-- end body page --></div>
        <!--end inner--></div>
	<!--container--></div>
</body>
</html>