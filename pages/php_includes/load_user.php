<!-- control product --><div style="float:left; width:100%; margin-top:5px; overflow:auto;">
    <table class="product" border="1" bordercolor="#00CCFF">
    <tr>
    <th>ACTION</th>
    <th>ID</th>
    <th>FIRSTNAME</th>
    <th>LASTNAME</th>
    <th>USERNAME</th>
    <th>USER ROLE</th>
    <th style="width:250px;">DOB</th>
    <th>PASSWORD</th>
    <th>EMAIL</th>
    <th>PHONE</th>
    <th>JOINED</th>
    <th>ADDRESS</th>
    <th>PICTURE</th>
    </tr>
    
    <?php
    $sql = "SELECT user_id,firstname,lastname,username,user_role,dob,password,email,phone,join_date,address,image FROM user u INNER JOIN role r ON u.role_id = r.role_id ORDER BY u.join_date DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td bgcolor="#FFCCFF"><input type="checkbox" name="action_check[]" value="<?php echo $row['user_id']; ?>" title="You are able to select a single or multiple to Delete item(s), Or update item." id="checkbox_action" onChange="focusCheck('update');"></td>
    <td><?php echo $row['user_id'];?></td>
    <td><?php echo $row['firstname'];?></td>
    <td><?php echo $row['lastname'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['user_role'];?></td>
    <td style="width:250px;"><?php echo $row['dob']; ?></td>
    <td><?php echo $objencryptpass->decrypt($row['password']);?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['phone'];?></td>
    <td><?php echo $row['join_date'];?></td>
    <td><?php echo $row['address'];?></td>
    <td bgcolor="#FFCCFF"><img src="../imgs/user_uploaded/<?php $img = $row['image']>""?$row['image']:'default/default.png'; echo $img;?>" title="<?php echo $row['image'];?>" width="40" height="30" alt="No Image"></td>
    </tr>
    <?php
        }
    } else {
        echo "<td colspan='12'>There are no user yet.</td>";
    }
    ?>
    </table>
<!-- end control product --></div>