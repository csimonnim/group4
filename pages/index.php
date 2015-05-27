<!-- body page --><div style="float:left; width:1050px; border:2px solid #CCC; border-radius:5px;">
    <!--title section--> <div style="float: left; width:99.85%; text-align:center; font-weight:bold; color:#03F; background:#CCC; padding:10px 0px 10px 0px; border:1px solid #999; border-top-left-radius:4px; border-top-right-radius:4px; margin:0px;">
        <span>WELCOME ADMIN PAGE</span>
    <!--end title section--></div>
    <!-- control welcome --><div style="float:left; width:100%; border-bottom:2px solid #CCC; margin:0px; border:1px solid #ccc;">
    	<!-- control new product --><div class="welcome_new">
        <div style="background-color:#09F; padding:3px 0px; border-radius:5px;"><span style="margin-left:7px; color:#FFF; font-weight:bold">LATEST PRODUCTS</span></div>
        <?php
		$sql = "SELECT p_id, brand, p_name, cate_name, quantity, unitprice, unitinstock, p_image, discountinued,p_description FROM product as p INNER JOIN brand as b ON p.brand_id = b.brand_id INNER JOIN category as c ON p.cate_id = c.cate_id ORDER BY p_id DESC LIMIT 4";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
		?>	
        	<!-- control list product --><div class="wel_pro">
            	<!-- product image --><div style="float:left; width:150px; height:180px; border:1px solid #09F; margin:9px 0px 9px 10px; border-radius:5px;">
                	<img src="../imgs/uploaded/<?php $img = $row['p_image']>""?$row['p_image']:'default/default.png'; echo $img;?>" width="150" height="180" title="<?php echo $row['p_name'];?>" style="border-radius:5px;" /> 
                <!-- end peoduct image --></div>
                <!-- control text 1 --><div style="float:left; width:410px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>ID : </span>
                        <span style="margin-left:100px; color:#00F"> <?php echo $row['p_id'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Brand : </span>
                        <span style="margin-left:78px; color:#00F"> <?php echo $row['brand'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Name : </span>
                        <span style="margin-left:79px; color:#00F"> <?php echo $row['p_name'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Category : </span>
                        <span style="margin-left:59px; color:#00F"> <?php echo $row['cate_name'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Quantity : </span>
                        <span style="margin-left:62px; color:#00F"> <?php echo $row['quantity'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Unit Price : </span>
                        <span style="margin-left:53px; color:#00F"> <?php echo $row['unitprice'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Unit In Stock : </span>
                        <span style="margin-left:32px; color:#00F"> <?php echo $row['unitinstock'];?> </span>
                    </div>
                <!-- end control text 1 --></div>
                <!-- control text 2 --><div style="float:left; width:412px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>Discountinued : </span>
                        <span style="margin-left:20px; color:#00F"> <?php echo $row['discountinued'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Description : </span>
                        <span style="margin-left:40px; color:#00F"> <?php echo $row['p_description'];?> </span>
                    </div>
                <!-- end control text 2 --></div>
            <!-- end control list product --></div>
            <?php
			}
		}
		?>
        <!-- end control new product --></div>
        <!-- control new user --><div class="welcome_new">
        <div style="background-color:#09F; padding:3px 0px; border-radius:5px;"><span style="margin-left:7px; color:#FFF; font-weight:bold">LATEST USERS</span></div>
        <?php
		$sql = "SELECT user_id,firstname,lastname,username,user_role,dob,password,email,phone,join_date,address,image FROM user u INNER JOIN role r ON u.role_id = r.role_id ORDER BY u.join_date DESC LIMIT 3";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
		?>	
        	<!-- control list product --><div class="wel_pro">
            	<!-- product image --><div style="float:left; width:150px; height:180px; border:1px solid #09F; margin:9px 0px 9px 10px; border-radius:5px;">
                	<img src="../imgs/user_uploaded/<?php $img = $row['image']>""?$row['image']:'default/default.png'; echo $img;?>" width="150" height="180" title="<?php echo $row['username'];?>" style="border-radius:5px;" /> 
                <!-- end peoduct image --></div>
                <!-- control text 1 --><div style="float:left; width:410px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>ID : </span>
                        <span style="margin-left:100px; color:#00F"> <?php echo $row['user_id'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Firstname : </span>
                        <span style="margin-left:56px; color:#00F"> <?php echo $row['firstname'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Lastname : </span>
                        <span style="margin-left:58px; color:#00F"> <?php echo $row['lastname'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>User Name : </span>
                        <span style="margin-left:48px; color:#00F"> <?php echo $row['username'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Role : </span>
                        <span style="margin-left:90px; color:#00F"> <?php echo $row['user_role'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Date of Birth : </span>
                        <span style="margin-left:36px; color:#00F"> <?php echo $row['dob'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Password : </span>
                        <span style="margin-left:59px; color:#00F"> <?php echo $objencryptpass->decrypt($row['password']);?> </span>
                    </div>
                <!-- end control text 1 --></div>
                <!-- control text 2 --><div style="float:left; width:412px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>Email : </span>
                        <span style="margin-left:48px; color:#00F"> <?php echo $row['email'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Phone : </span>
                        <span style="margin-left:46px; color:#00F"> <?php echo $row['phone'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Joined Date : </span>
                        <span style="margin-left:10px; color:#00F"> <?php echo $row['join_date'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Address : </span>
                        <span style="margin-left:35px; color:#00F"> <?php echo $row['address'];?> </span>
                    </div>
                <!-- end control text 2 --></div>
            <!-- end control list product --></div>
            <?php
			}
		}
		?>
        <!-- end control new user --></div>
        <!-- control new brand --><div class="welcome_new">
        <div style="background-color:#09F; padding:3px 0px; border-radius:5px;"><span style="margin-left:7px; color:#FFF; font-weight:bold">LATEST BRANDS</span></div>
        <?php
		$sql = "SELECT * FROM brand ORDER BY brand_id DESC LIMIT 3";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
		?>	
        	<!-- control list product --><div class="wel_pro">
            	<!-- product image --><div style="float:left; width:150px; height:180px; border:1px solid #09F; margin:9px 0px 9px 10px; border-radius:5px;">
                	<img src="../imgs/brand_uploaded/<?php $img = $row['brand_image']>""?$row['brand_image']:'default/default.png'; echo $img;?>" width="150" height="180" title="<?php echo $row['brand'];?>" style="border-radius:5px;" /> 
                <!-- end peoduct image --></div>
                <!-- control text 1 --><div style="float:left; width:410px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>ID : </span>
                        <span style="margin-left:100px; color:#00F"> <?php echo $row['brand_id'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Brand : </span>
                        <span style="margin-left:78px; color:#00F"> <?php echo $row['brand'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Description : </span>
                        <span style="margin-left:42px; color:#00F"> <?php echo $row['description'];?> </span>
                    </div>
                <!-- end control text 1 --></div>
                <!-- control text 2 --><div style="float:left; width:412px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	
                <!-- end control text 2 --></div>
            <!-- end control list product --></div>
            <?php
			}
		}
		?>
        <!-- end control new brand --></div>
        <!-- control new category --><div class="welcome_new">
        <div style="background-color:#09F; padding:3px 0px; border-radius:5px;"><span style="margin-left:7px; color:#FFF; font-weight:bold">LATEST CATEGORIES</span></div>
        <?php
		$sql = "SELECT * FROM category ORDER BY cate_id DESC LIMIT 3";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
		?>	
        	<!-- control list product --><div class="wel_pro">
            	<!-- product image --><div style="float:left; width:150px; height:180px; border:1px solid #09F; margin:9px 0px 9px 10px; border-radius:5px;">
                	<img src="../imgs/cate_uploaded/<?php $img = $row['cate_image']>""?$row['cate_image']:'default/default.png'; echo $img;?>" width="150" height="180" title="<?php echo $row['cate_name'];?>" style="border-radius:5px;" /> 
                <!-- end peoduct image --></div>
                <!-- control text 1 --><div style="float:left; width:410px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">
                	<div class="new_pro">
                    	<span>ID : </span>
                        <span style="margin-left:100px; color:#00F"> <?php echo $row['cate_id'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Category : </span>
                        <span style="margin-left:60px; color:#00F"> <?php echo $row['cate_name'];?> </span>
                    </div>
                    <div class="new_pro">
                    	<span>Description : </span>
                        <span style="margin-left:46px; color:#00F"> <?php echo $row['c_description'];?> </span>
                    </div>
                <!-- end control text 1 --></div>
                <!-- control text 2 --><div style="float:left; width:412px; height:180px; border:1px solid #CCC; margin:9px 0px 9px 10px; border-radius:5px;">

                <!-- end control text 2 --></div>
            <!-- end control list product --></div>
            <?php
			}
		}
		?>
        <!-- end control new category --></div>
    <!-- end control welcome --></div>
<!-- end body section --></div>