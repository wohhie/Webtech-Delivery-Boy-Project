<?php include 'core/init.php' ?>



<?php



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'template-part/header.php'; 

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

    <div class="container-fluid">
        <div class="row">
            <!-- DASHBOARD MENU -->
            <div class="col-lg-2">
                
                <?php include 'template-part/lists.php'; ?>
            </div>
            <!-- DASHBOARD MENU -->
        </div>
    </div>
    
    <br><br><br>
    
</div>








<?php include 'template-part/footer.php'; ?>