
<?php include 'core/init.php' ?>


<?php 

DB::getInstance();
    
    if(Users::logged_in() && $_SESSION['role'] == 'CUSTOMER'){
        
    }else{
        header("Location: signin.php");
    }

    
    
    


?>

<?php   include 'template-part/header.php'; ?>

<div class="container">
    <div class="row">
        <h3 class="sub-title">Products <a href="add_product.php">Add Product <i class="fa fa-plus"></i></a></h3>
        
        
        
        <div class="store-layout">
            
            
        </div>
    </div>
    
    
</div>








<?php include 'template-part/footer.php'; ?>