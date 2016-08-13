<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template-part/header.php'; ?>

<?php 
    
    //connect to database;
    DB::getInstance();
    
    //retrive information from database;
    $products = DB::getInstance()->query('products');
    


?>

<div class="container">
    <div class="row">
        <h3 class="sub-title">Shop <a href="create_stores.php">Create Store</a></h3>
        
        
        
        <div class="store-layout">
            
            <?php while( $row = mysql_fetch_assoc($products) ) : ?>
            
            <div class="col-lg-3">
                <div class="store-content">
                    <img class="img-responsive" src="<?php echo $row['p_image_path'] ."/". $row['p_image']  ?>" alt="<?php echo $row['image'] ?>">
                    <h3><a href="#"><?php echo $row['p_name'] ?></a></h3>
                    <p><?php echo $row['p_desc']; ?></p>
                    
                    <div class="shop-links">
                        <a href="cart.php?productID=<?php echo $row['id']; ?>"  class="btn btn-primary">Add to Cart</a>
                        <a href="single_product.php?product_id=<?php echo $row['id']; ?>"  class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </div>
    
    
</div>








<?php include 'template-part/footer.php'; ?>