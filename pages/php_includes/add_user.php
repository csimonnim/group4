<!-- control title & list product --><div class="control_product">
    <!-- title show product --><div class="control_title">
    <div class="control_text_title">
    <span style="color:#09F">ADD NEW USER</span>
    </div>
    <!-- end title show product --></div>
    <!-- list product --><div class="control_list_product">
        <!-- control product --><div style="float:left; width:99.80%;">
         <form method="post" enctype="multipart/form-data">
            <!-- button --><div class="control_button_pro">
            <input type="submit" class="button" title="After you have been completed all the required fields. Click on Save to save the data." name="btnSave" value="Save"/>
            <input type="submit" class="button" title="Go Back." name="btnCancel" onClick="" value="Back" />
            <!-- end button --></div>
            <div class="add_pro">
            <label style="margin-right:130px" for="txtuser_id">User ID :</label>
            <input type="number" class="textbox" id="txtid" name="txtuserid" placeholder="Input User ID">
            </div>
            <div class="add_pro">
            <label style="margin-right:110px" for="txtfirstname">First Name :</label>
            <input type="text" class="textbox" id="txtfirstname" name="txtfirstname" placeholder="Input first name">
            </div>
            <div class="add_pro">
            <label style="margin-right:112px" for="txtlastname">Last Name :</label>
            <input type="text" class="textbox" id="txtlastname" onchange="generateUsername('txtfirstname','txtlastname','txtusername')" name="txtlastname" placeholder="Input last name">
            </div>
            <div class="add_pro">
            <label style="margin-right:111px" for="txtusername">User Name :</label>
            <input type="text" class="textbox" id="txtusername" name="txtusername" onfocus="generateUsername('txtfirstname','txtlastname','txtusername')" onmousedown="generateUsername('txtfirstname','txtlastname','txtusername')" placeholder="Input user name">
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
            <input style="width:172px;" type="date" class="textbox" id="txtDateofBirth" name="txtDateofBirth" placeholder="Date of Birth">
            </div>
            <div class="add_pro">
            <label style="margin-right:123px" for="txtpassword">Password :</label>
            <input type="password" class="textbox" onchange="countLength(this.value,'count_msg')" onblur="countLength(this.value,'count_msg')" id="txtpassword" name="txtpassword" placeholder="Password" >
            <span id="count_msg" style="color:#F00; text-shadow:1px 1px #FF6699; margin-left:20px;"></span>
            </div>
            <div class="add_pro">
            <label style="margin-right:92px" for="txtpassword">Con-Password :</label>
            <input type="password" class="textbox" onfocus="" id="txtcon_password" onblur="matchPass('txtpassword','txtcon_password','match_msg')" name="txtcon_password" placeholder="Con-Password" >
            <span id="match_msg" style="color:#F00; text-shadow:1px 1px #FF6699; margin-left:20px;"></span>
            </div>
            <div class="add_pro">
            <label style="margin-right:147px" for="txtemail">Email :</label>
            <input type="email" class="textbox" id="txtemail" name="txtemail" placeholder="Email">
            </div>
            <div class="add_pro">
            <label style="margin-right:146px" for="txtphone">Phone :</label>
            <input type="text" class="textbox" id="txtphone" name="txtphone" placeholder="Phone" value="">
            </div>
            <div class="add_pro">
            <label style="margin-right:110px" for="txtjoindate">Joined Date :</label>
                            <input type="date" style="width:172px;" class="textbox" id="txtjoindate" name="txtjoindate" value="<?php $date = Getdates();echo $date; ?>">
            </div>
            <div class="add_pro">
            <label style="margin-right:134px" for="txtaddress">Address :</label>
            <input type="text" class="textbox" id="txtaddress" name="txtaddress" placeholder="Address">
            </div>
            <div class="add_pro">
            <label style="margin-right:113px" for="ImageUpload">User Image :</label>
            <input type="file" name="ImageUpload" accept="image/*">
            </div>
            </form>
        <!-- end control product --></div>
    <!-- end list product --></div>
<!-- end control title & list product --></div>