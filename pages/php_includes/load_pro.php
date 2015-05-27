<!-- control product --><div style="float:left; width:100%; margin-top:5px;">
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
    <th>DESCRIPTION</th>
    </tr>
    
    <?php
    $sql = "SELECT p_id, brand, p_name, cate_name, quantity, unitprice, unitinstock, p_image, discountinued,p_description FROM product as p INNER JOIN brand as b ON p.brand_id = b.brand_id INNER JOIN category as c ON p.cate_id = c.cate_id ORDER BY p_id ASC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
    <tr>
    <td bgcolor="#FFCCFF"><input type="checkbox" name="action_check[]" value="<?php echo $row['p_id']; ?>" title="You are able to select a single or multiple to Delete product(s), Or update product." id="checkbox_action" onChange="focusCheck('update');"></td>
    <td><?php echo $row['p_id'];?></td>
    <td><?php echo $row['brand'];?></td>
    <td><?php echo $row['p_name'];?></td>
    <td><?php echo $row['cate_name'];?></td>
    <td><?php echo $row['quantity'];?></td>
    <td><?php echo $row['unitprice'];?></td>
    <td><?php echo $row['unitinstock'];?></td>
    <td bgcolor="#FFCCFF"><img src="../imgs/uploaded/<?php $img = $row['p_image']>""?$row['p_image']:'default/default.png'; echo $img;?>" title="<?php echo $row['p_name'];?>" width="40" height="30" alt="No Image"></td>
    <td><?php echo $row['discountinued'];?></td>
    <td bgcolor="#CCCCCC" style="max-width:150px;"><?php echo $row['p_description'];?></td>
    </tr>
    <?php
        }
    } else {
        echo "<td colspan='12'>There are no product yet.</td>";
    }
    ?>
    </table>
<!-- end control product --></div>