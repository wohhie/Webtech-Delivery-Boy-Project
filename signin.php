
<?php include 'core/init.php' ?>

<?php
    
    //connecting to database.
    DB::getInstance();
    
    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //STORE COMPANY
        
        $storeLogin = DB::getInstance()->get('store', array(
                                            "str_owner_email='$email'",
                                            "str_password='$password'"));
        
        
        if( $storeLogin == false){
            //CHECK CUSTOMER `table`
            $cutomerLogin = DB::getInstance()->get('users', array(
                                            "email='$email'",
                                            "password='$password'"));
            
            
            if($cutomerLogin){
                //CUSTOM SESSION START.
                $_SESSION['user'] = $cutomerLogin;
                $_SESSION['role'] = 'CUSTOMER';

                //START COOKIE;

                //REDIRECT
                header("Location: index.php");
                echo 'Custome Done';
                exit();
                
            }else{
                //INVALID USER.
                echo 'Invalid User.';
            }
            
        }else{
            //STORE OWNER SESSION START
            $_SESSION['user'] = $storeLogin;
            $_SESSION['role'] = 'STORE';

            //START COOKIE;

            //REDIRECT
            header("Location: dashboard_store.php");
            echo 'Store Done';
        }
        
        
        
    }
    
    
    
    if(isset($_POST['success']) && isset($_POST['email']) ){
        
        $email = $_POST['email'];
        
        
        $storeLogin = DB::getInstance()->query('store', array(
                                            "str_owner_email='$email'"));
        
        if(mysql_num_rows($storeLogin) == 1){
            echo 'exist';
            
        }else{
        
        
            $cutomerLogin = DB::getInstance()->query('users', array(
                                            "email='$email'",
                                            "password='$password'"));
            
            if(mysql_num_rows($cutomerLogin) == 1 ){
                echo 'exist';
            }else{
                
                echo 'invalid';
                
            }
            
        }
    }else{
    
        
?>
    
  

<?php include 'template-part/header.php';   ?>  
        
        
        <!-- REGISTRATION SECTION -->
        <div class="container">
           
                <div class="reg-page">
                    <div class="form">    
                        <h3 class="sub-title">Sign In</h3>
                         
                        
                        <p id="success"></p>
                        <p id="errorMessage"></p>
                        
                        <!-- REGISTRATION FROM -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!--FORM START-->
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label for="name" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="email" id="email" onBlur="checkEmailOnServer('email')" placeholder="Enter email">
                                    </div>
                                    <div class="col-lg-4"><p id="emailStatus" class="error"></p></div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="password" id="password" onblur="emptyCheckValidation('password', 'passwordStatus')" placeholder="Enter password">
                                    </div>
                                    <div class="col-lg-4"><p id="passwordStatus" class="error"></p></div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-10">
                                      <button type="submit" name="submit" id="submit" class="btn btn-default">Sign In</button>
                                  </div>
                                </div>

                            </div>
                            <!-- END col-lg-6 -->
                        </form>

                        <!-- REGISTRATION FROM -->
                      
                    </div>
                </div>
                
        </div>
        <!-- REGISTRATION SECTION -->
        
        
        
        
        
    </div>
    
<?php  include 'template-part/footer.php'; ?>

<?php } ?>