<!-- control product --><div style="float:left; width:100%; margin-top:5px;">
    <table class="product" border="1" bordercolor="#00CCFF">
    <tr>
    <th>ACTION</th>
    <th>ID</th>
    <th>BRAND</th>
    <th>IMAGE</th>
    <th>DESCRIPTION</th>
    </tr>
    
    <?php
    $sql = "SELECT * FROM brand ORDER BY brand_id ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td bgcolor="#FFCCFF"><input type="checkbox" name="action_check[]" value="<?php echo $row['brand_id']; ?>" title="You are able to select a single or multiple to Delete item(s), Or update item." id="checkbox_action" onChange="focusCheck('update');"></td>
    <td><?php echo $row['brand_id'];?></td>
    <td><?php echo $row['brand'];?></td>
    <td bgcolor="#FFCCFF"><img src="../imgs/brand_uploaded/<?php $img = $row['brand_image']>""?$row['brand_image']:'default/default.png'; echo $img;?>" title="<?php echo $row['brand'];?>" width="40" height="30" alt="No Image"></td>
    <td bgcolor="#CCCCCC" style="max-width:150px;"><?php echo $row['description'];?></td>
    </tr>
    <?php
        }
    } else {
        echo "<td colspan='5'>There are no brand yet.</td>";
    }
    ?>
    </table>
<!-- end control product --></div>