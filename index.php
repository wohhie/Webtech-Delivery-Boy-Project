<?php include 'core/init.php' ?>
<?php

    //retrive information from database;
    $products = DB::getInstance()->query('products');
    $topRated = DB::getInstance()->query('products');



?>


    <?php include 'template-part/header.php';   ?>
    <section id="header-background">
        <div clas="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <form class="search-product" method="post" action="searchproduct.php">
                        <div class="form-group">
                              <h1 for="search">Search Product</h1>
                              <input type="text" class="form-control" id="search" name="search"  placeholder="search Product">
                            </div
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>


    <section id="section">
        <div class="container">
            <div class="row">
                <h3 class="sub-title">Featured Product</h3>
                <?php while($row = mysql_fetch_assoc($products)) :  ?>
                <div class="products">
                    <div class="col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <div class="img">
                                <img class="img-responsive" src="<?php echo $row['p_image_path'] ."/". $row['p_image']  ?>" alt="<?php echo $row['image'] ?>">
                            </div>

                          <div class="caption">
                            <h4 class="pull-right">$<?php echo $row['p_price'] ?></h4>
                            <h4><a href="#"><?php echo $row['p_name'] ?></a></h4>
                            <p><?php echo $row['p_desc'] ?></p>
                          </div>
                            <a href="single_product.php?product_id=<?php echo $row['id'] ?>" class="btn btn-primary"> Details</a>
                        </div>

                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <!-- FEATURED SECTION -->
        </div>
    </section>

    <section id="section">
        <div class="container">
            <!-- RATED SECTION -->
            <div class="row">
                <h3 class="sub-title">Top Rated Product</h3>
                <?php while ( $top_rated = mysql_fetch_assoc($topRated)) :  ?>
                <div class="products">
                    <div class="col-lg-3">
                        <div class="thumbnail">
                            <div class="img">
                                <img class="img-responsive" src="<?php echo $top_rated['p_image_path'] ."/". $top_rated['p_image']  ?>" alt="<?php echo $row['image'] ?>"/>
                            </div>
                            
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $top_rated['p_price'] ?></h4>
                                <h4><a href="#"><?php echo $top_rated['p_name'] ?></a></h4>
                                <p><?php echo $top_rated['p_desc'] ?></p>
                            </div>
                            <a href="single_product.php?product_id=<?php echo $top_rated['id'] ?>" class="btn btn-primary">Details</a>
                        </div>
                        
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <!-- RATED SECTION -->
        </div>
    </section>
    


<?php include 'template-part/footer.php';   ?>
