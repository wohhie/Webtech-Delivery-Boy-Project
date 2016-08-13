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
    $shop = DB::getInstance()->query('store');
    



?>
<div class="container">
    <div class="row">
        <h3 class="sub-title">Shop <a href="create_stores.php">Create Shop  <i class="fa fa-plus"></i></a></h3>
        
        
        
        <div class="store-layout">
            
            <?php while( $row = mysql_fetch_assoc($shop) ) : ?>
            
            <div class="col-lg-3">
                <div class="store-content">
                    <img class="img-responsive" src="<?php echo $row['store_image_path'] ."/". $row['image']  ?>" alt="<?php echo $row['image'] ?>">
                    <p><a href="#"><?php echo $row['store_name'] ?></a></p>
                    <p><span>Location :</span> <?php echo $row['store_location'] ?></p>
                    <a href="#">Check your Route</a>
                    
                    <a href="single_shop.php?storename=<?php echo $row['store_name']; ?>"  class="btn btn-primary">View Products</a>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </div>
    
    
</div>








<?php include 'template-part/footer.php'; ?>