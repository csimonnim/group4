<?php include("../connect_db/connect.php");?>
<html>
<head>
	<title>GROUP 4 - Products</title>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <script>
	function popupCenter(url, title, w, h) {
	  var left = (screen.width/2)-(w/2);
	  var top = (screen.height/2)-(h/2);
	  return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
	} 
	</script>
</head>
<body>
	<!--container--><div id="container" style="">
        <!--inner--><div class="inner">
            <!-- body page --><div style="float:left; width:1050px; border:1px solid #CCC;">	
                <!--title section--> <div style="float: left; width:1050px; text-align:center;">
               		<span>PRODUCTS</span>
                <!--end title section--></div>
                <!-- add product --><div style="float:left; width:1018px; border:1px solid #CCC; padding:15px;">
                <button style="" onClick="popupCenter('popup_add_pro.php','GROUP 4 - ADD PRODUCTS',817,450);" name="btnAddNew">Add New</button>
                <button style="" name="btnDelete">Delete</button>
                <button style="" name="btnUpdate">Update</button>
                <!-- end add product --></div>
                <!-- control product --><div style="float:left; width:1050px; margin-top:5px;">
                	<table class="product" border="1" bordercolor="#00CCFF">
                    <tr>
                    <th>ACTION</th>
                    <th>ID</th>
                    <th>BRAND</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>QUANTITY</th>
                    <th>UNIT PRICE</th>
                    <th>UNIT IN STOCK</th>
                    <th>IMAGE</th>
                    <th>DISCOUNTED</th>
                    </tr>
                    <?php
					$sql = "SELECT p_id, brand, p_name, cate_name, quantity, unitprice, unitinstock, p_image, discountinued FROM product as p INNER JOIN brand as b ON p.brand_id = b.brand_id INNER JOIN category as c ON p.cate_id = c.cate_id";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
					?>
                    <tr>
                    <td bgcolor="#0099FF"><input type="checkbox" name="action" value="<?php echo $row['p_id']; ?>" title="You are able to select a single or multiple to Delete or Update the product(s)."></td>
                    <td><?php echo $row['p_id'];?></td>
                    <td><?php echo $row['brand'];?></td>
                    <td><?php echo $row['p_name'];?></td>
                    <td><?php echo $row['cate_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['unitprice'];?></td>
                    <td><?php echo $row['unitinstock'];?></td>
                    <td><img src="../imgs/product_images/<?php echo $row['p_image'];?>" title="" width="30" height="25" alt="None"></td>
                    <td><?php echo $row['discountinued'];?></td>
                    </tr>
                    <?php
						}
					} else {
						echo "<td colspan='11'>There are no product yet.</td>";
					}
					$conn->close();
					?>
                    </table>
                <!-- end control product --></div>
        	<!-- end body page --></div>
        <!--end inner--></div>
	<!--container--></div>
</body>
</html>