<?php include("php_includes/event_user.php");?>
    <!-- message --><p class="msg"><?php echo $msg; ?></p>	
        <!-- body page --><div style="display:inline; float:left; width:1050px; border:2px solid #CCC; border-radius:5px;">
            <!--title section--> <div style="float: left; width:99.85%; text-align:center; font-weight:bold; color:#03F; background:#CCC; padding:10px 0px 10px 0px; border:1px solid #999; border-top-left-radius:4px; border-top-right-radius:4px; margin:0px;">
                <span>USER SETTING</span>
            <!--end title section--></div>
            <form method="post" style="margin:0px; padding:0px;">
            <!-- add product --><div style="float:left; width:100%; border-bottom:2px solid #CCC; margin:0px;">
            <button class="button_a" id="add_new" style="" name="btnAddnew" onClick="">Add User</button>
            <button class="button_a" style="" name="btnDelete" id="deleteRe" onClick="return confirm('Are you sure to delete that field(s)?');">Delete</button>
            <button class="button_a" style="" id="update" name="btnCallUpdate" onClick="">Update</button>
            <button class="button_a" style="" name="btnRefresh" id="refreshPage" onClick="">Refresh</button>
            <button class="button_a" style="" name="btnClose" id="btnBack">Back</button>
            <!-- end add product --></div>
            <?php
            if(!isset($_POST["btnAddnew"]) && !isset($_POST["btnCallUpdate"])){include_once("php_includes/load_user.php");}
            ?>
            </form>
            <?php
            if(isset($_POST["btnAddnew"])){include_once("php_includes/add_user.php"); ?> <script language="javascript">DisableButton('deleteRe','refreshPage','btnBack','update');</script> <style>#add_new {visibility:hidden;}  #update, #btnBack, #refreshPage {background:#999;}#deleteRe {background:#999;}</style> <?php }
            else if(isset($_POST["btnCallUpdate"])){ 
            foreach ($checkList as $check){
                if (!empty($check)){
                    $item = implode(",",$check);
                    $query = "SELECT * FROM user WHERE user_id = ".$item.""; 
                    $result = $conn->query($query);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                        ?>
                        <script>
                        function Getcbo(){
                        document.getElementById("<?php echo "r".$row['role_id']; ?>").selected = "true";
                        }
                        </script>
                    <!-- control title & list product --><div class="control_product">
                        <!-- title show product --><div class="control_title">
                        <div class="control_text_title">
                        <span style="color:#09F">UPDATE USER</span>
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
                            <img src="../imgs/user_uploaded/<?php $img = $row['image']>""?$row['image']:'default/default.png'; echo $img; ?>" alt="" width="130" height="150" style="border-radius:5px;" />
                            <!-- end control image --></div>
                            <div class="add_pro">
                            <label style="margin-right:130px" for="txtuser_id">User ID :</label>
                            <input type="number" class="textbox" id="txtid" name="txtuserid" value="<?php echo $row['user_id']; ?>">
                            <label id="txtuser_id"><?php echo $row['user_id']; ?></label>
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:110px" for="txtfirstname">First Name :</label>
                            <input type="text" class="textbox" id="txtfirstname" name="txtfirstname" value="<?php echo $row['firstname']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:112px" for="txtlastname">Last Name :</label>
                            <input type="text" class="textbox" id="txtlastname" name="txtlastname" onchange="generateUsername('txtfirstname','txtlastname','txtusername')" value="<?php echo $row['lastname']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:111px" for="txtusername">User Name :</label>
                            <input type="text" class="textbox" id="txtusername" onfocus="generateUsername('txtfirstname','txtlastname','txtusername')" onmousedown="generateUsername('txtfirstname','txtlastname','txtusername')" name="txtusername" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:119px" for="cboRole">User Role :</label>
                            <select name="cboRole" id="cboRole" class="select">
                            <?php
                            $sql = "SELECT * FROM role ORDER BY role_id ASC";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($rowr = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $rowr['role_id']; ?>" id="<?php echo "r".$rowr['role_id']; ?>" title="<?php echo $rowr['description']; ?>"><?php echo $rowr['user_role']; ?></option>
                            <?php
                                }
                            } else {
                                echo "<option>No role yet.</option>";
                            }
                            ?>
                            </select>
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:100px" for="txtDateofBirth">Date of Birth :</label>
                            <input type="date" style="width:172px;" class="textbox" id="txtDateofBirth" name="txtDateofBirth" value="<?php echo $row['dob']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:123px" for="txtpassword">Password :</label>
                            <input type="password" class="textbox" id="txtpassword" onchange="countLength(this.value,'count_msg')" onblur="countLength(this.value,'count_msg')" name="txtpassword" value="<?php echo $objencryptpass->decrypt($row['password']); ?>" >
                            <span id="count_msg" style="color:#F00; text-shadow:1px 1px #FF6699; margin-left:20px;"></span>
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:92px" for="txtpassword">Con-Password :</label>
                            <input type="password" class="textbox" id="txtcon_password" onblur="matchPass('txtpassword','txtcon_password','match_msg')" name="txtpassword" value="<?php echo $objencryptpass->decrypt($row['password']); ?>" >
                            <span id="match_msg" style="color:#F00; text-shadow:1px 1px #FF6699; margin-left:20px;"></span>
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:147px" for="txtemail">Email :</label>
                            <input type="email" class="textbox" id="txtemail" name="txtemail" value="<?php echo $row['email']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:146px" for="txtphone">Phone :</label>
                            <input type="text" class="textbox" id="txtphone" name="txtphone" value="<?php echo $row['phone']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:110px" for="txtjoindate">Joined Date :</label>
                            <input type="date" style="width:172px;" class="textbox" id="txtjoindate" name="txtjoindate" value="<?php echo $row['join_date']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:134px" for="txtaddress">Address :</label>
                            <input type="text" class="textbox" id="txtaddress" name="txtaddress" value="<?php echo $row['address']; ?>">
                            </div>
                            <div class="add_pro">
                            <label style="margin-right:113px" for="ImageUpload">User Image :</label>
                            <input type="file" name="ImageUpload" accept="image/*">
                            </div>
                            </form>
                            <!-- end control product --></div>
                        <!-- end list product --></div>
                    <!-- end control title & list product --></div>
                        <script language="javascript">
                        Getcbo();
                        DisableUpId('txtid');
                        </script>
                        <?php
                        }
                    }
                }else{
                    echo "There are no product to update.<br><br><form method='post'><input style='margin-top:20px;' class='button' type='submit' name='btnCancel' value='Back'></form>";
                }
            }
            ?> <script language="javascript">DisableButton('deleteRe','refreshPage','btnBack','add_new');</script> <style>#add_new {background:#999;}#btnBack {background:#999;} #update {visibility:hidden;} #refreshPage {background:#999;}#deleteRe {background:#999;}</style> <?php }?>
        <!-- end body page --></div>