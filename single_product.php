<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template-part/header.php'; ?>

<?php 
    
    
    $single_product = $_GET['product_id'];
    
    //RETRIVE SINGLE PRODCUT INFORMATION
    $products = DB::getInstance()->query('products', array(
        'id'    =>  $single_product,
    ));
    
    
?>



<div class="container">
    <?php while( $product = mysql_fetch_assoc($products) ) : ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="product-details">
                <img class="img-responsive" src="<?php echo $product['p_image_path'] ."/". $product['p_image']  ?>" alt="<?php echo $product['p_image'] ?>">
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="product-details">
                <div class="store-content">
                    
                    <h4> <?php echo $product['p_name']; ?>  </h4>
                    <p> <?php echo $product['p_desc']; ?> </p>
                    <p class="price"> Price : <span>$ <?php echo $product['p_price']; ?></span></p>
                    <p></p>
                    <p> category : <span>Food, Burger</span> </p>

                    <div class="btn-group">
                    <a href="cart.php?productID=<?php echo $product['id']; ?>"  class="btn btn-primary">Add to Cart</a>
                    <a href="cart.php"  class="btn btn-primary">View Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    
    
    <br><br><br>
    
    <!-- SHOW ALL PRODUCT BELOGS TO THIS BRAND -->
    <div class="row">
        <?php while( $product = mysql_fetch_assoc($products) ) : ?>
        <div class="col-lg-3">
            
        </div>
        <?php endwhile; ?>
        
    </div>
    <!-- SHOW ALL PRODUCT BELOGS TO THIS BRAND -->
    
</div>








<?php include 'template-part/footer.php'; ?>