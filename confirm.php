<?php 

include 'core/init.php';

include 'template-part/header.php';

if(Users::logged_in() && $_SESSION['role'] == 'CUSTOMER'){
        //connect to database;
        
    
    }else{
        header("Location: index.php");
    }
    

$email = $_GET['useremail'];

$message = "We already take your oder. We will send order in 1day.";

mail($email, 'My Subject', $message);?>






<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="sub-title">Successfully.</h2>
            <h2>Congratulation! We take your Order. </h2>
            <a href="index.php">Move To Home Page For start again.</a>
        </div>
    </div>
</div>




    
<?php include 'template-part/footer.php';

?>



