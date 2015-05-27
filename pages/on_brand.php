<?php include("php_includes/event_brand.php");?>
    <!-- message --><p class="msg"><?php echo $msg; ?></p>	
        <!-- body page --><div style="float:left; width:1050px; border:2px solid #CCC; border-radius:5px;">
            <!--title section--> <div style="float: left; width:99.85%; text-align:center; font-weight:bold; color:#03F; background:#CCC; padding:10px 0px 10px 0px; border:1px solid #999; border-top-left-radius:4px; border-top-right-radius:4px; margin:0px;">
                <span>BRANDS</span>
            <!--end title section--></div>
            <form method="post" style="margin:0px; padding:0px;">
            <!-- add product --><div style="float:left; width:100%; border-bottom:2px solid #CCC; margin:0px;">
            <button class="button_a" id="add_new" style="" name="btnAddnew" onClick="">Add New</button>
            <button class="button_a" style="" name="btnDelete" id="deleteRe" onClick="return confirm('Are you sure to delete that field(s)?');">Delete</button>
            <button class="button_a" style="" name="btnCallUpdate" id="update" onClick="">Update</button>
            <button class="button_a" style="" name="btnRefresh" id="refreshPage" onClick=";">Refresh</button>
            <button class="button_a" style="" id="btnBack" name="btnBack" onclick="callHome('mi1');">Back</button>
            <!-- end add product --></div>
            <?php
            if(!isset($_POST["btnAddnew"]) && !isset($_POST["btnCallUpdate"])){include_once("php_includes/load_brand.php");}
            ?>
            </form>
            <?php
            if(isset($_POST["btnAddnew"])){include_once("php_includes/add_brand.php"); ?> <script language="javascript">DisableButton('deleteRe','refreshPage','update','btnBack');</script> <style>#add_new {visibility:hidden;}  #refreshPage , #deleteRe , #btnBack , #update {background:#999;}</style> <?php }
            else if(isset($_POST["btnCallUpdate"])){ 
            foreach ($checkList as $check){
                if (!empty($check)){
                    $item = implode(",",$check);
                    $query = "SELECT * FROM brand WHERE brand_id = ".$item.""; 
                    $result = $conn->query($query);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                    <!-- control title & list product --><div class="control_product">
                        <!-- title show product --><div class="control_title">
                        <div class="control_text_title">
                        <span style="color:#09F">UPDATE BRAND</span>
                        </div>
                        <!-- end title show product --></div>
                        <!-- list product --><div class="control_list_product">
                            <!-- control product --><div style="float:left; width:100%;">
                            <form method="post" enctype="multipart/form-data">
                            <!-- button product --><div class="control_button_pro">
                            <input type="submit" class="button" title="After you have been completed all the required fields. Click on Update to update the data." name="btnUpdate" value="Update"/>
                            <input type="submit" class="button" title="Go Back." name="btnCancel" onClick="" value="Back" />
                            <!-- end button product --></div>
                            <!-- control image --><div style="float:right; border:1px solid #CCC; border-radius:5px; width:130px; height:150px; margin:0px 140px 20px 0px;">
                            <img src="../imgs/brand_uploaded/<?php $img = $row['brand_image']>""?$row['brand_image']:'default/default.png'; echo $img; ?>" alt="" width="130" height="150" style="border-radius:5px;" />
                            <!-- end control image --></div>
                            <div class="add_pro">
                            <label style="margin-right:120px" for="txtPro_id">Brand ID :</label>
                            <input type="number" class="textbox" id="txtid" name="txtb_id" value="<?php echo $row['brand_id']; ?>" placeholder="Input product ID">
                            <label><?php echo $row['brand_id']; ?></label>
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:100px" for="txtPro_name">Brand Name :</label>
                            <input type="text" class="textbox" id="txtPro_name" name="txtb_name" value="<?php echo $row['brand']; ?>" placeholder="Input product name">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:100px" for="ImageUpload">Brand Image :</label>
                            <input type="file" name="ImageUpload" accept="image/*">
                            </div>
                            <div class="add_pro">
                            <label for="txtDescription" style="margin-right:108px;">Description :</label>
                            <textarea name="txtDescription" id="txtDescription" class="textarea"><?php echo $row['description']; ?></textarea>
                            </div>
                            </form>
                            <script>
                            DisableUpId("txtid");
                            </script>
                            <!-- end control product --></div>
                        <!-- end list product --></div>
                    <!-- end control title & list product --></div>
                        <?php
                        }
                    }
                }else{
                    echo "There are no brand to update.<br><br><form method='post'><input style='margin-top:20px;' class='button' type='submit' name='btnCancel' value='Back'></form>";
                }
            }
            ?> <script language="javascript">DisableButton('deleteRe','refreshPage','add_new','btnBack');</script> <style>#update {visibility:hidden;} #add_new , #refreshPage , #btnBack , #deleteRe {background:#999;}</style> <?php }?>
        <!-- end body page --></div>