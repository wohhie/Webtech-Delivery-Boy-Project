<?php include 'core/init.php'; ?>

<?php 
    

    if(isset($_GET['productID'])){
        
    
        //GETTING USER PRODCUT ID
        $productID = $_GET['productID'];

        //GETTING USER IP ADDRESS
        $ip = Users::getIP();

        //DATE
        $date = date('Y-m-d');

        //CHECK CART TABLE FOR DOUBLE ENTRY
        $check = DB::getInstance()->query('p_cart', array(
            'p_id' =>   $productID,
            'ip_address'    =>  $ip,
        ));

        //IF MORE THAN ONE
        if(mysql_num_rows($check) > 0){

            echo "Cannot Insert.Alreay Added.";

        }else{
            //INSERT INTO CART TABLE;
            $args = array(
                'p_id'  =>  $productID,
                'ip_address'    =>  $ip,
                'p_quantity'    =>  1,
                'cart_created'  =>  $date,
            );  	  	 

            DB::getInstance()->insert('p_cart', $args);
    //        echo "<script>window.open('single_shop.php?storename='". $storename .",'_self')</script>";

        }
    
    }
    
    
    
    //PRODUCT INFORMATION WITH CART
    $cart = DB::getInstance()->join('products', 'p_cart');
    
    
    
    $price .= "";
    $total = DB::getInstance()->join('products', 'p_cart');
    
    while($row = mysql_fetch_assoc($total)){
        $price += $row['p_price'];
    }
    
    
    //DISPLAY CART INFORMATION
            
            
     


?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template-part/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Price</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysql_fetch_assoc($cart) ):  ?>
                    
                    <tr class="product-info">
                        <td class="col-sm-8 col-md-6">
                            <img class="cart-img" src="<?php echo $row['p_image_path']. '/' . $row['p_image'] ?>">
                            <h5><span>Product Name : </span> <?php echo $row['p_name']; ?></h5>
                        </td>
                        
                        <td class="col-sm-1 col-md-1 text-center"><strong>$<?php echo $row['p_price']; ?></strong></td>
                        <td class="col-sm-1 col-md-1">
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    
                    <tr>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td><h3><strong>$ <?php echo $price; ?></strong></h3></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <a href="shop.php" type="button" class="btn btn-default">
                            <span class="fa fa-angle-left"></span> Continue Shopping
                        </a></td>
                        <td>
                            <a href="payment.php?totalPrice=<?php echo $price ?>" class="btn btn-success">
                            Checkout <span class="fa fa-shopping-basket"></span>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'template-part/footer.php'; ?>