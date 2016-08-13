<?php 

include 'core/init.php';

include 'template-part/header.php';

    
    $search = $_POST['search'];
    
    
    
    $result = mysql_query("SELECT * FROM products WHERE p_name LIKE '%".$search."%'");
    
    
    
?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="sub-title">Search Product</h2>
            
                
            
            <table class="table">
                <tr>
                    
                    <th>Product ID : </th>
                    <th>Product Name : </th>
                    <th>Product Price : </th>
                    <th>Product Image</th>
                </tr>
                
                <?php while ($row = mysql_fetch_assoc($result)) :  ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><a href="single_product.php?product_id=<?php echo $row['id']; ?>"><?php echo $row['p_name']; ?></a></td>
                    <td><?php echo $row['p_price']; ?></td>
                    
                    <td><img class="cart-img" src="<?php echo $row['p_image_path'] . $row['p_image'] ?>"></td>
                </tr>
                <?php endwhile; ?>
            </table>
            
                
        </div>
    </div>
</div>




    
<?php include 'template-part/footer.php';

?>



