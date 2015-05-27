
<!-- control title & list product --><div class="control_product">
    <!-- title show product --><div class="control_title">
    <div class="control_text_title">
    <span style="color:#09F">ADD NEW PRODUCT</span>
    </div>
    <!-- end title show product --></div>
    <!-- list product --><div class="control_list_product">
        <!-- control product --><div style="float:left; width:100%;">
        <form action="" method="post" enctype="multipart/form-data">
        <!-- button product --><div class="control_button_pro">
        <input type="submit" class="button" title="After you have been completed all the required fields. Click on Save to save the data." name="btnSave" value="Save"/>
        <input type="submit" class="button" title="Go Back." name="btnCancel" onClick="" value="Back" />
        <!-- end button product --></div>
        <div class="add_pro">
        <label style="margin-right:120px" for="txtPro_id">Product ID :</label>
        <input type="number" class="textbox" name="txtPro_id" placeholder="Input product ID">
        </div>
        <div class="add_pro">
        <label style="margin-right:152px" for="cboBrand">Brand :</label>
        <select name="cboBrand" class="select">
        <?php
        $sql = "SELECT brand_id, brand FROM brand ORDER BY brand_id ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['brand_id']; ?>"><?php echo $row['brand']; ?></option>
        <?php
            }
        } else {
            echo "<option>No brand yet.</option>";
        }
        //$conn->close();
        ?>
        </select>
        </div>
        <div class="add_pro">
        <label style="margin-right:100px" for="txtPro_name">Product Name :</label>
        <input type="text" class="textbox" name="txtPro_name" placeholder="Input product name">
        </div>
        <div class="add_pro">
        <label style="margin-right:132px" for="cboCate">Category :</label>
        <select name="cboCate" class="select">
        <?php
        $sql = "SELECT cate_id, cate_name FROM category ORDER BY cate_id ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?php echo $row['cate_id']; ?>"><?php echo $row['cate_name']; ?></option>
        <?php
            }
        } else {
            echo "<option>No category yet.</option>";
        }
		$conn->close();
        ?>
        </select>
        </div>
        <div class="add_pro">
        <label style="margin-right:136px" for="txtQuantity">Quantity :</label>
        <input type="text" class="textbox" name="txtQuantity" placeholder="Input product Quantity">
        </div>
        <div class="add_pro">
        <label style="margin-right:126px" for="txtUnitprice">Unit Price :</label>
        <input type="text" class="textbox" name="txtUnitprice" placeholder="Input Unit price">
        </div>
        <div class="add_pro">
        <label style="margin-right:106px" for="txtUnitInstock">Unit In Stock :</label>
        <input type="text" class="textbox" name="txtUnitInstock" placeholder="Input Unit In Stock">
        </div>
        <div class="add_pro">
        <label style="margin-right:100px" for="chimage">Product Image :</label>
        <input type="file" name="ImageUpload" id="ImageUpload" accept="image/*">
        </div>
        <div style="margin-right:130px" class="add_pro">
        <label style="margin-right:100px" for="txtDiscountinued">Discountinued :</label>
        <select name="cboDiscountinued" class="select">
        <option value="1">True</option>
        <option value="0">False</option>
        </select> 
        </div>
        <div class="add_pro">
        <label style="margin-right:120px; margin-bottom:30px;">Description :</label>
        <textarea name="txtDescription" class="textarea"></textarea>
        </div>
        </form>
        <!-- end control product --></div>
    <!-- end list product --></div>
<!-- end control title & list product --></div>