
<?php include 'core/init.php' ?>


<?php 

DB::getInstance();
    
    if(Users::logged_in() && $_SESSION['role'] == 'CUSTOMER'){
        //connect to database;
        
    
    }else{
        header("Location: index.php");
    }
    
        

    
    //PRODUCT INFORMATION WITH CART
    $cart = DB::getInstance()->join('products', 'p_cart');
    
    


?>

<?php   include 'template-part/header.php'; ?>

<div class="container">
    <div class="row">
        <h3 class="sub-title">Payment System </h3>
        
        
        
        <div class="store-layout">
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                </tr>
                
                <?php while($row = mysql_fetch_assoc($cart)) :  ?>
                <tr>
                    <td><?php echo $row['p_name'];?></td>
                    <td><?php echo $row['p_quantity'];?></td>
                    <td><strong>$<?php echo $row['p_price'];?></strong></td>
                </tr>
                <?php endwhile; ?>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td> 
                    <td><strong>Total Price :<?php echo $_GET['totalPrice'] ?></strong></td></td>
                </tr>
            </table>
            
            <a class="btn btn-default navbar-right" href="confirm.php?useremail=<?php echo $user_data['email'] ?>">Confirm Oder</a>
        </div>
    </div>
    
    
</div>



<?php include 'template-part/footer.php'; ?>