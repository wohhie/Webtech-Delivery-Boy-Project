<?php include 'core/init.php' ?>
 
        
<?php 

    $userID = (int)(Users::logged_in()) ? $_SESSION['user'] : '';
    
    
    //COLLECT DATA FROM DATABASE;
    $userData = DB::getInstance()->join('users', 'users_info', array(
            't1.id' => $userID,
    ));
        
    
    if(isset($_POST['submit'])){
        
        
        $photo = $_FILES["image"]["name"];
        
        $path = "upload/profile/";
        move_uploaded_file($_FILES["image"]["tmp_name"], "$path".$_FILES["image"]["name"]);
        
//        
//        //RETRIVE DATA FROM DATABASE - `users_info`
//        $userData = DB::getInstance()->query('users_info', array(
//            'userid'    =>  $userID,
//        ));
        
        //COLLECT DATA FROM INPUT
        $date = date('Y-m-d H:i:s');
    

        //UPDATE PROFILE.
        $data = array(
            'firstname'         => $_POST['firstname'],
            'lastname'          => $_POST['lastname'],
            'address'           => $_POST['address'],
            'phone'             => $_POST['phone'],
            'photo'             =>  $photo,
            'user_image_path'   =>  $path
        );
        
        
        
        $update = DB::getInstance()->update('users_info',array('userid' => $userID ), $data );

        echo ($update) ? 'Updated.' : 'Updated Problem.';

    
    }
    
    
    
    
?>

<?php include 'template-part/header.php';   ?>     
  
        <!-- REGISTRATION SECTION -->
        <div class="container">
           
                <div class="reg-page">
                    <div class="form">    
                        <h3 class="sub-title">Edit Profile</h3>
                         
                        <?php while ($row = mysql_fetch_assoc($userData)) :  ?>
                        <!-- REGISTRATION FROM -->
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <!--FORM START-->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="uploaded-image"><img id="output" src="<?php echo $row['user_image_path'] . $row['photo']; ?>" /></div>
                                    <label for="exampleInputFile" class="col-sm-4 control-label">Store Logo</label>
                                    <div class="col-sm-8">
                                        <input type="file" type="file" accept="image/*" name="image" onchange="loadFile(event)" id="exampleInputFile">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="username" class="col-sm-4 control-label">username</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" disabled="disabled" name="username" value="<?php echo $row['username'] ?>" id="username" placeholder="Enter first name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="firstname" class="col-sm-4 control-label">First Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $row['firstname'] ?>" placeholder="Enter first name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                        <label for="lastname" class="col-sm-4 control-label">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $row['lastname'] ?>" placeholder="Enter last name">
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="phone" class="col-sm-4 control-label">Phone</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone'] ?>" placeholder="Store phone">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address" class="col-sm-4 control-label">Address</label>
                                    <div class="col-sm-8">
                                        <textarea row="3" class="form-control" name="address" id="address" placeholder="Enter address"><?php echo $row['address'] ?></textarea>
                                    </div>
                                </div>
                                
                                

                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-10">
                                      <button type="submit" name="submit" id="submit" class="btn btn-default">Update Profile</button>
                                  </div>
                                </div>

                            </div>
                            
                            
                            <div class="col-lg-6"></div>
                            <!-- START col-lg-6 -->
                            <div class="col-lg-6">
                                

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