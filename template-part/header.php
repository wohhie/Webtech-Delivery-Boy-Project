<?php include 'core/init.php' ?>



<!DOCTYPE html>
<html>
<head>
    <title>Deliver Boy</title>
    <link href="css/extra/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/font-awesome.css" type="text/css" rel="stylesheet">
    <link href="css/custom-style.css" type="text/css" rel="stylesheet">
    
</head>
<body>
    
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Delivery</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li ><a href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a></li>
                    <li class="dropdown">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="brands.php">Product By Brand</a></li>
                            <li><a href="shop.php">All Products</a></li>
                        </ul>
                        
                    </li> 
                    <li><a href="cart.php">Cart</a></li>
                        
                </ul>
                
              
                <ul class="nav navbar-nav navbar-right">
                    <?php  if(Users::logged_in()) :  ?>
                    <li>
                            <?php 
                                //CHECK STORE ROLE.
                                if(Users::logged_in() && $_SESSION['role'] === 'STORE') :   ?>
                                <a href="dashboard_store.php">
                                    <img class="mini-profile-photo" src="<?php echo $user_data['store_image_path'] .'/'. $user_data['image']; ?>" alt="profile_name"> <?php echo $user_data['store_name'];  ?>
                                
                                </a>     
                                <?php 
                                //CHECK CUSTOMER ROLE
                                elseif(Users::logged_in() && $_SESSION['role'] === 'CUSTOMER'): ?>
                                <a href="#">
                                    <img class="mini-profile-photo" src="<?php echo $user_data['user_image_path'] .'/'. $user_data['photo']; ?>" alt="profile_name"> <?php echo $user_data['username'];  ?>
                                
                                </a>
                                <?php endif;
                                //SHOW OTHER IMAGE.
                            ?>
                        </li>
                    <!--CHANGE CUSTOMER TO BUYER--> 
                    <?php if ((Users::logged_in()) &&  ($_SESSION['role'] == 'CUSTOMER')) :   ?>
                    <li><a href="create_storeS.php">Create Store</a></li>
                    <?php endif; ?>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> Account <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="edit_profile.php">Edit Profile</a></li>
                            <!--<li><a href="edit_password.php">Edit Password</a></li>-->
                            <li class="divider"></li>
                            <li><a href="signout.php">Sign Out</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                    
                    <?php  if(! Users::logged_in()) : ?>
                    <li><a href="create_stores.php"><i class="fa fa-shopping-basket"></i> Create Store</a></li>
                    <li><a href="signin.php">Sign In</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    <?php endif; ?>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    
    
        