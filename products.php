
<?php include 'core/init.php' ?>


<?php 

DB::getInstance();
    
    if(Users::logged_in() && $_SESSION['role'] == 'STORE'){
        //connect to database;
    

        $storeID = $_SESSION['user'];

        //retrive information from database;
        $products = DB::getInstance()->query('products', array(
            'p_brand'    =>  $storeID,
        ));
    }else{
        header("Location: index.php");
    }

    
    
    


?>

<?php   include 'template-part/header.php'; ?>

<div class="container">
    <div class="row">
        <h3 class="sub-title">Products <a href="add_product.php">Add Product <i class="fa fa-plus"></i></a></h3>
        
        
        
        <div class="store-layout">
            
            <?php while( $row = mysql_fetch_assoc($products) ) : ?>
            
            <div class="col-lg-3">
                <div class="store-content">
                    <img class="img-responsive" src="<?php echo $row['p_image_path'] ."/". $row['p_image']  ?>" alt="<?php echo $row['image'] ?>">
                    <h3><a href="#"><?php echo $row['p_name'] ?></a></h3>
                    
                    <a href="cart.php?add_to_cart=<?php echo $row['id']; ?>"  class="btn btn-primary">Add to Cart</a>
                    <a href="single_product.php?product_id=<?php echo $row['id']; ?>"  class="btn btn-primary">View</a>
                </div>
            </div>
            <?php endwhile; ?>
            
        </div>
    </div>
    
    
</div>








<?php include 'template-part/footer.php'; ?>