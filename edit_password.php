<?php include 'core/init.php';   ?>      
        
<?php 


    DB::getInstance();
    if(Users::logged_in() && $_SESSION['role'] == 'CUSTOMER'){
        //connect to database;
    

        $storeID = $_SESSION['user'];

        //retrive information from database;
        $products = DB::getInstance()->query('products', array(
            'p_brand'    =>  $storeID,
        ));
    }else{
        header("Location: index.php");
    }

    $userID = (int)(Users::logged_in()) ? $_SESSION['user'] : '';
    
    
    //COLLECT DATA FROM DATABASE;
    $userData = DB::getInstance()->join('users', 'users_info', array(
            't1.id' => $userID,
    ));
        
    
    if(isset($_POST['submit'])){
        
        $date = date('Y-m-d H:i:s');
    

        
    }
    
    
    
    
?>



<?php include 'template-part/header.php';   ?>     
  
        <!-- REGISTRATION SECTION -->
        <div class="container">
           
                <div class="reg-page">
                    <div class="form">    
                        <h3 class="sub-title">Change Password</h3>
                         
                        <?php while ($row = mysql_fetch_assoc($userData)) :  ?>
                        <!-- REGISTRATION FROM -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username" class="col-sm-4 control-label">username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled="disabled" name="username" value="<?php echo $row['username'] ?>" id="username" placeholder="Enter first name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="oldpassword" class="col-sm-4 control-label">Old Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="oldpassword" id="oldpassword" value="<?php echo $user_data['password']?>" placeholder="Enter first name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">New Password</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="password" id="password" value="<?php echo $row['firstname'] ?>" placeholder="Enter first name">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label for="confirmPassword" class="col-sm-4 control-label">Confrim Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" value="<?php echo $row['firstname'] ?>" placeholder="Enter first name">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-10">
                                      <button type="submit" name="submit" id="submit" class="btn btn-default">Update Password</button>
                                  </div>
                                </div>

                            </div>
                            
                            <!-- END col-lg-6 -->
                        </form>
                        <?php endwhile; ?>

                        <p id="success"></p>
                        <!-- REGISTRATION FROM -->
                      
                </div>
                
        </div>
        <!-- REGISTRATION SECTION -->
        
        
        
        
        
    </div>
    
<?php  include 'template-part/footer.php'; ?>