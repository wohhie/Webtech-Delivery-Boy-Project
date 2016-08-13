<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template-part/header.php'; ?>

<?php 
    
    
    $storename = $_GET['storename'];
    
    //RETRIVE STORE INFORMATION
    $brand = DB::getInstance()->query('store', array(
        'store_name'    =>  $storename,
    ));
    
    //RETRIVE BRAND ID BY STORENAME
    $id = DB::getInstance()->queryID('store', array(
        'store_name'    =>  $storename,
    ));
    
    
    //RETRIVE BRAND PRODUCTS 
    $products = DB::getInstance()->query('products', array(
        'p_brand'    =>  $id,
    ));
    
    
    
    
    
    
    
    
?>



<div class="container">
    <?php while( $row = mysql_fetch_assoc($brand) ) : ?>
    <div class="row">
        <h3 class="sub-title"><i class="fa fa-shopping-bag"></i> Store : <?php echo $row['store_name']; ?> <a href="add_product.php">Add Product <i class="fa fa-plus"></i></a></h3>

        
        <div class="store-layout">
            <!-- SINGLE PRODUCT -->
            <div class="col-md-3">
                <div class="store-single">
                    <img class="img-responsive" src="<?php echo $row['store_image_path'] ."/". $row['image']  ?>" alt="<?php echo $row['image'] ?>">
                    
                </div>
            </div>
            
            
            <!-- PRODUCT INFORMATION -->
            <div class="col-md-8">
                <div class="info">
                    <p><span>Store Location:</span> <?php echo $row['store_location']; ?></p>
                    <p><span>Store Owner:</span> <?php echo $row['owner_name']; ?></p>
                    <p><span>Phone :</span> <?php echo $row['phone']; ?></p>
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
            <div class="store-single">
                <img class="img-responsive" src="<?php echo $product['p_image_path'] ."/". $product['p_image']  ?>" alt="<?php echo $product['p_image'] ?>">
                    
                <h4> <?php echo $product['p_name']; ?>  </h4>
                <p class="desc"> <?php echo $product['p_desc']; ?> </p>
                <p> <span> Price :</span> <?php echo $product['p_price']; ?></p>
                <p> <span>category </span>: Food, Burger</p>
                
                <a href="cart.php?productID=<?php echo $product['id']; ?>"  class="btn btn-primary">Add to Cart</a>
                <a href="single_product.php?product_id=<?php echo $product['id']; ?>" class="btn btn-primary">View</a>
            </div>
        </div>
        <?php endwhile; ?>
        
    </div>
    <!-- SHOW ALL PRODUCT BELOGS TO THIS BRAND -->
    
</div>








<?php include 'template-part/footer.php'; ?>