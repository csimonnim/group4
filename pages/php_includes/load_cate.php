<!-- control product --><div style="float:left; width:100%; margin-top:5px;">
    <table class="product" border="1" bordercolor="#00CCFF">
    <tr>
    <th>ACTION</th>
    <th>ID</th>
    <th>CATEGORY</th>
    <th>IMAGE</th>
    <th>DESCRIPTION</th>
    </tr>
    
    <?php
    $sql = "SELECT * FROM category ORDER BY cate_id ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td bgcolor="#FFCCFF"><input type="checkbox" name="action_check[]" value="<?php echo $row['cate_id']; ?>" title="You are able to select a single or multiple to Delete item(s), Or update item." id="checkbox_action" onChange="focusCheck('update');"></td>
    <td><?php echo $row['cate_id'];?></td>
    <td><?php echo $row['cate_name'];?></td>
    <td bgcolor="#FFCCFF"><img src="../imgs/cate_uploaded/<?php $img = $row['cate_image']>""?$row['cate_image']:'default/default.png'; echo $img;?>" title="<?php echo $row['cate_name'];?>" width="40" height="30" alt="No Image"></td>
    <td bgcolor="#CCCCCC" style="max-width:150px;"><?php echo $row['c_description'];?></td>
    </tr>
    <?php
        }
    } else {
        echo "<td colspan='5'>There are no category yet.</td>";
    }
    ?>
    </table>
<!-- end control product --></div>