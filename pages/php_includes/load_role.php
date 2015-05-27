<!-- control product --><div style="float:left; width:100%; margin-top:5px;">
    <table class="product" border="1" bordercolor="#00CCFF">
    <tr>
    <th>ACTION</th>
    <th>ID</th>
    <th>ROLE</th>
    <th>ROLE FILE NAME</th>
    <th>DESCRIPTION</th>
    </tr>
    
    <?php
    $sql = "SELECT * FROM role ORDER BY role_id ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td bgcolor="#FFCCFF"><input type="checkbox" name="action_check[]" value="<?php echo $row['role_id']; ?>" title="You are able to select a single or multiple to Delete item(s), Or update item." id="checkbox_action" onChange="focusCheck('update');"></td>
    <td><?php echo $row['role_id'];?></td>
    <td><?php echo $row['user_role'];?></td>
    <td><?php echo $row['role_file'];?></td>
    <td bgcolor="#CCCCCC" style="max-width:150px;"><?php echo $row['description'];?></td>
    </tr>
    <?php
        }
    } else {
        echo "<td colspan='4'>There are no role yet.</td>";
    }
    ?>
    </table>
<!-- end control product --></div>