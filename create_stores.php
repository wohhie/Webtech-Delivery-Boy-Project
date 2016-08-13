<?php include 'core/init.php' ?>

<?php 

    //CONNECT TO DB
    //-------------------------------------------------
    DB::getInstance();
    
    
    
    
    //RETRIVE CATEGORY
    $category = DB::getInstance()->query('p_category');
    
    //RETRIVE TAG
    $tag = DB::getInstance()->query('p_tag');
    

    if(isset($_POST['submit'])){
        
        $upload_image = $_FILES["image"]["name"];
        
        $path = "upload/";
        move_uploaded_file($_FILES["image"]["tmp_name"], "$path".$_FILES["image"]["name"]);
//        
//        $insert_path=mysql_query("INSERT INTO products (p_image_path,p_image) VALUES('$path','$upload_image')");
//        
//        
        //COLLECT DATA FROM INPUT
        $date = date('Y-m-d H:i:s');
        
        
        //SELECT KFC IS A BRAND
        $user_data = array(
            'store_name'            =>      $_POST['name'],
            'store_location'        =>      $_POST['location'],
            'owner_name'            =>      $_POST['username'],
            'str_owner_email'       =>      $_POST['email'],
            'phone'                 =>      $_POST['phone'],
            'store_image_path'      =>      $path,
            'image'                 =>      $upload_image,
            'str_password'          =>      $_POST['password'] ,
            'created'               =>      $date,
        ); 
         	 	 	 	 	 	 	 	 
        
        
        
        //inserting to worker table;
        $insert = DB::getInstance()->insert('store', $user_data );

        
        //RETRIVE USERID from `store`   TABLE
        $userID = DB::getInstance()->queryID('store', array(
            'str_owner_email' =>  $_POST['email'],
        ) );
        
        
        //INSERT id INTO `users_info` TABLE
        $insert = DB::getInstance()->insert('store_info', $atts = array(
            'userid'    =>  $userID,
        ) );
        
            
        echo ($insert) ? 'Added Successfully.' : 'Problem' ;
        
    }
    

?>


<?php include 'template-part/header.php';  ?>

    <div class="container">
        <div class="row">
            <!-- DASHBOARD MENU -->
            <div class="col-lg-3">
                <?php 
                if( Users::logged_in() && $_SESSION['role'] === 'STORE') { 
                    include 'template-part/lists.php';
                }
                ?>
            </div>
            <!-- DASHBOARD MENU -->
            
            <!-- UPLOAD PRODUCT -->
                
                <div class="col-lg-9">
                <h3>Create Store</h3>
                <hr>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!--FORM START-->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Store Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Store name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Owner Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username" id="username" value="<?php echo (Users::logged_in() && $_SESSION['role'] === 'CUSTOMER') ? $user_data['username'] : ''?>" placeholder="Owner username">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Owner Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email" value="<?php echo (Users::logged_in() && $_SESSION['role'] === 'CUSTOMER') ? $user_data['email'] : ''?>" id="email" placeholder="Owner email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="location" class="col-sm-4 control-label">Store Location</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="location" name="location" placeholder="Store location">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="description" class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="add store description"></textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Store Password</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Store Password">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-10">
                                  <button type="submit" name="submit" id="submit" class="btn btn-default">Create Store</button>
                              </div>
                            </div>

                        </div>
                        <!-- END col-lg-6 -->
                        
                        
                        
                        <!-- START col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="uploaded-image"><img id="output" /></div>
                                <label for="exampleInputFile" class="col-sm-4 control-label">Store Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" type="file" accept="image/*" name="image" onchange="loadFile(event)" id="exampleInputFile">
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Store phone">
                                </div>
                            </div>
                            
<!--                            
                            <div class="form-group">
                                <label for="category" class="col-sm-4 control-label">City</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="category" id="category">
                                        <option value="0">-SELECT CITY-</option>
                                        <option value="0">Dhaka</option>
                                        <option value="0">Chittagong</option>
                                        <option value="0">Rajshahi</option>
                                    </select>
                                </div>
                            </div>-->
                        </div>
                        <!-- END col-lg-6 -->
                    </form>
                <!--FORM END-->
            </div>
            <!-- UPLOAD PRODUCT -->
        </div>
    </div>
    
    <br><br><br>
    
</div>








<?php include 'template-part/footer.php'; ?>