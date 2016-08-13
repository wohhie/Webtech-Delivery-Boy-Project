<?php include 'core/init.php' ?>


<?php 

    //CONNECT TO DB
    //-------------------------------------------------
    DB::getInstance();
    
    //RETRIVE CATEGORY
    $category = DB::getInstance()->query('p_category');
    
    //RETRIVE TAG
    $tag = DB::getInstance()->query('p_tag');
    
    //RETRIVE BRANDS
    echo $_SESSION['user'];
    
    
    
    
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
            'p_name'        =>      $_POST['name'],
            'p_price'       =>      $_POST['price'],
            'p_image_path'  =>      $path,
            'p_image'       =>      $upload_image,
            'p_desc'        =>      $_POST['description'],
            'p_brand'       =>      $_SESSION['user'],       
            'p_tag'         =>      $_POST['tag'],
            'p_category'    =>      $_POST['category'],
            'created'       =>      $date,
        ); 
	  	  	 	  	  	 
 
            
            //inserting to worker table;
            $insert = DB::getInstance()->insert('products', $user_data );
            
            echo ($insert) ? 'Added successfully' : 'Problem' ;
            

    }
    
    
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
            <!-- DASHBOARD MENU -->
            <div class="col-lg-3">
                <?php include 'template-part/lists.php' ?>
            </div>
            <!-- DASHBOARD MENU -->
            
            <!-- UPLOAD PRODUCT -->
                
                <div class="col-lg-9">
                <h3>Add Product</h3>
                <hr>
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <!--FORM START-->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label">Product Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="product name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="col-sm-4 control-label">Description</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="add product description"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price" class="col-sm-4 control-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="product price">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tag" class="col-sm-4 control-label">Brand</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tag" id="tag">
                                        <option value="<?php echo $_SESSION['user'] ?>"><?php echo $user_data['store_name'] ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tag" class="col-sm-4 control-label">Tag</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="tag" id="tag">
                                        <option value="0">-SELECT TAG-</option>
                                        <?php while( $row = mysql_fetch_assoc($tag)) :  ?>
                                        <option value="<?php echo $row['tag_id'] ?>"><?php echo $row['tag_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- CATEGORY LIST -->
                            <div class="form-group">
                                <label for="category" class="col-sm-4 control-label">Category</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="category" id="category">
                                        <option value="0">-SELECT CATEGORY-</option>
                                        <?php while( $row = mysql_fetch_assoc($category)) :  ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-4 col-sm-10">
                                  <button type="submit" name="submit" id="submit" class="btn btn-default">Add Product</button>
                              </div>
                            </div>

                        </div>
                        <!-- END col-lg-6 -->
                        
                        
                        
                        <!-- START col-lg-6 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="uploaded-image"><img id="output" /></div>
                                <label for="exampleInputFile" class="col-sm-4 control-label">File input</label>
                                <div class="col-sm-8">
                                    <input type="file" type="file" accept="image/*" name="image" onchange="loadFile(event)" id="exampleInputFile">
                                </div>
                                
                                
                            </div>
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