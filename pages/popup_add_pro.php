<html>
<head>
	<title>GROUP 4 - Add product</title>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
</head>
<body>
	<!--container--><div id="container" style="">
        <!--inner--><div class="inner">
            <!-- body page --><div style="float:left; width:800px; border:1px solid #006;">	
                <!-- control title & list product --><div class="control_product">
                    <!-- title show product --><div class="control_title">
                    <div class="watch_icon"></div>
                    <div class="control_text_title">
                    <span style="color:#09F">ADD PRODUCTS</span>
                    </div>
                    <!-- end title show product --></div>
                    <!-- list product --><div class="control_list_product">
                        <!-- add product --><div style="float:left; width:800px;">
                <button style="" title="After you have been completed all the required fields. Click on Save to save the data." name="btnAddNew">Save</button>
                <!-- end add product --></div>
                <!-- control product --><div style="float:left; width:800px; margin-top:2px;">
                	<form action="add_pro.php" method="post" enctype="multipart/form-data">
                    <div class="add_pro">
                    <label for="txtPro_id">Product ID</label>
                    <input type="text" name="txtPro_id" placeholder="Input product ID">
                    </div>
                    <div class="add_pro">
                    <label for="cboBrand">Brand</label>
                    <select name="cboBrand">
                    <?php
					
					?>
                    <option>1</option>
                    </select>
                    </div>
                    <div class="add_pro">
                    <label for="txtPro_id">Product ID</label>
                    <input type="text" name="txtPro_id" placeholder="Input product ID">
                    </div>
                    <div class="add_pro">
                    <label for="txtPro_id">Product ID</label>
                    <input type="text" name="txtPro_id" placeholder="Input product ID">
                    </div>
                    <div class="add_pro">
                    <label for="txtPro_id">Product ID</label>
                    <input type="text" name="txtPro_id" placeholder="Input product ID">
                    </div>
                    <div class="add_pro">
                    <label for="txtPro_id">Product ID</label>
                    <input type="text" name="txtPro_id" placeholder="Input product ID">
                    </div>
                    </form>
                <!-- end control product --></div>
                    <!-- end list product --></div>
                <!-- end control title & list product --></div>
        	<!-- end body page --></div>
        <!--end inner--></div>
	<!--container--></div>
</body>
</html>