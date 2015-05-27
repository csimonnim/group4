<?php 
session_start();
include("../connect_db/connect.php"); $conn = connect_db();include("../pages/php_includes/php/checkImage.php");
checkLogin($conn);
//print_r($user);
$user_img = isset($user[0]['image'])?$user[0]['image']:"default/default.png";
include("../pages/php_includes/php/encryptpass.php");
$objencryptpass = new encryptpass(); $request = isset($_REQUEST["request"])?$_REQUEST["request"]:"HOME";
if(isset($_GET['logout']) == "true"){ $objencryptpass->logout($_SESSION['id']); }?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/admin.ico" />
	<title>GROUP 4 - <?php echo $request; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <script type="text/javascript" src="../pages/js_includes/include_js.js"></script>
</head>
<body>
	<!--container--><div id="container" style="background:url(../css/images/bga_footer.gif) repeat-x bottom; margin:0px -8px;">
        <!--inner--><div class="inner">
            <!-- body page --><div style="float:left; width:1050px;">	
                <!--Header section--> <div class="header">
               		<!-- block menu --><div class="menu">
                    <?php
					$pageID = isset($_REQUEST["pageID"])?$_REQUEST["pageID"]:"0";
					$openpage = "index.php";
					
					$sql = "SELECT * FROM menu ORDER BY m_id ASC";
					$result = $conn->query($sql);
					if($result->num_rows > 0){
							while ($row = $result->fetch_assoc()){
								$menu_class="menu_text";
								if($request==$row['menu']){
									$menu_class="menu_text_current";	
								}	
								if($request == $row['menu'] && $pageID == $row['m_id']){
									$openpage = $row['link'];
									$title = $row['title'];
								}
							?>
                            	<!-- control each menu --><div class="each_menu">
								<a href="?request=<?php echo $row['menu']; ?>&pageID=<?php echo $row['m_id']; ?>" title="<?php echo $row['title']; ?>" class="<?php echo $menu_class; ?>" id="<?php echo trim("M".$row['m_id']); ?>"><span><?php echo $row['menu']; ?></span></a>
								<!-- end control each menu --></div>
						<?php }
						}
					?>
                    <!-- end block menu --></div>
                    <!-- block user profile --><div class="admin_profile">
                    	<!-- user profile image --><div class="user_image">
                        <img src="../imgs/user_uploaded/<?php echo $user_img; ?>" height="100" width="120" title="">
                        <!-- end user profile image --></div>
                        <!-- account setting --><div style="text-align:center;">
                        <a href="#" class="link" title="Account Setting">Account Setting</a>
                        <!-- end account setting --></div>
                        <!-- log out --><div style="text-align:center;">
                        <a href="?logout=true" class="link" title="Log Out">Log Out</a>
                        <!-- end log out --></div>
                    <!-- end block user profile --></div>
                <!--end Header section--></div>
<!-- ********************************************** End header section **************************************************-->
                <!-- content section --><div style="float:left; border:0px solid #333; width:1050px;">
                <?php 
				include("../pages/".$openpage);
				?>
                <!-- end content section --></div>
                <!-- footer --><div style="float:left; text-align:center; border-top:0px solid #00F; margin:0px 0px 0px 0px; width:1050px; height:181px;">
                <!-- control copyright --><div style="margin-top:150px;">
                <span style="color:#999;">Copyright © <?php echo Date("Y"); ?> GROUP 4. All Rights Reserved.</span>
                <!-- end control copyright --></div>
                <!-- end footer --></div>
        	<!-- end body page --></div>
        <!--end inner--></div>
	<!--container--></div>
</body>
</html>