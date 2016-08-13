
<?php include 'core/init.php' ?>

<?php


    if(isset($_POST['success'])){
        
        //if user exists
        
        //connecting to database.
        DB::getInstance();
        if(Users::user_exists($_POST['email']) === true ){
            echo "Username Already Exists";
        }
        
        $date = date('Y-m-d');
        $data = array(
            'username' =>   $_POST['username'],
            'password' =>   $_POST['password'],
            'email' =>   $_POST['email'],
            'gender'    =>  $_POST['gender'],
        ); 

        
        //inserting to USER table;
        $insert = DB::getInstance()->insert('users', $data );
        
        
        
        
        //RETRIVE USERID from `users`   TABLE
        $userID = DB::getInstance()->queryID('users', array(
            'email' =>  $_POST['email'],
        ) );
        
        
        
        //INSERT id INTO `users_info` TABLE
        $insert = DB::getInstance()->insert('users_info', $atts = array(
            'userid'    =>  $userID,
        ) );
        

        echo ($insert) ? 'success' : 'failed';
        
        
    }else{
    
    
?>




<?php include 'template-part/header.php';   ?>
    
        <!-- REGISTRATION SECTION -->
        <div class="container">
           
                <div class="reg-page">
                    <div class="form">    
                        <h3 class="sub-title">Registration</h3>
                         
                        <p id="errorMessage"></p>

                        <p id="success"></p>
                        
                        <!-- REGISTRATION FROM -->
                        <form class="form-horizontal" id="registration" name="registration" onSubmit="return signupValidation()">
                            <!--FORM START-->
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="name" class="col-sm-4 control-label">Username</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="username" id="username" onBlur="emptyCheckValidation('username', 'usernameStatus')" placeholder="Enter username">
                                    </div>
                                    <div class="col-lg-3"><p id="usernameStatus" class="error"></p></div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-4 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="email" id="email" onBlur="emptyCheckValidation('email', 'emailStatus')" placeholder="Enter email">
                                    </div>
                                    <div class="col-lg-3"><p id="emailStatus" class="error"></p></div>
                                </div>


                                <div class="form-group">
                                    <label for="password" class="col-sm-4 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="password" name="password" onBlur="emptyCheckValidation('password', 'emailStatus')" placeholder="Enter password">
                                    </div>
                                    <div class="col-lg-3"><p id="passwordStatus" class="error"></p></div>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label for="confirmpassword" class="col-sm-4 control-label">Confirm Password</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" onBlur="matchPassword('password', 'confirmpassword')" placeholder="Confirm password">
                                    </div>
                                    <div class="col-lg-3"><p id="confirmValidPassword" class="error"></p></div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="gender" class="col-sm-4 control-label">Gender</label>
                                    <div class="col-sm-4">
                                        <input type="radio" class="" name="gender" id="gender" value="male" checked="checked"> Male <br>
                                        <input type="radio" class="" name="gender" id="gender" value="female"> Female
                                    </div>
                                    <div class="col-lg-3"><p id="genderStatus" class="error"></p></div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-10">
                                      <button type="submit" id="submit" class="btn btn-default">Sign Up</button>
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