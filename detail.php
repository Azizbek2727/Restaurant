
<?php include 'header.php'; ?>

  <?php  
            $query = "SELECT image FROM detail_image ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($db,$query);
            $recording = mysqli_fetch_assoc($result);
            $image_detail = $recording['image'];
        ?>
    <?php
        $id=$_GET['id'];
        $sql ="SELECT * FROM foods WHERE id = $id";
        $result = mysqli_query($db, $sql);
        if (!$result) {
            $error = 'detail.php line 9 Error fetching data: ' . mysqli_error($db);
            echo $error;
            exit();
        }
    ?>
    <!-- Blog begin -->
    <img src="<?php echo $image_detail; ?>" class="d-none d-sm-none d-md-none d-lg-block d-xl-block" alt="1920x250" class="h-250">
    <!-- Blog end -->

    <!-- Main content begin -->
    <div class="container mt35">
        <div class="row pb50">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                <?php
                    while($recording=mysqli_fetch_assoc($result)) :
                        $name = $recording['name'];
                        $description = $recording['description'];
                        $price = $recording['cost'];
                        $category_id = $recording['category_id'];
                        $img = $recording['img'];
                        $type_id = $recording['type_id'];
                        $created_at = $recording['created_at'];
                ?>
                    <div class="mt35 pb35"> 
                    <img src="<?php echo $img; ?>" class="w-100 h-420" alt="845x400">
                    <div class="row">
                        <div class="col-0 col-sm-0 col-md-0 col-lg-2 col-xl-2">
                            
                        </div>
                        <div class="col-10 pt25">
                            <h3><?php echo $name; ?></h3>
                            <p><?php echo $description; ?></p>
                            <div class="row bb-lightgrey bt-lightgrey">
                                <div class="col-6 pt10 pb10">
                                    <a href="#" class="btn btn-warning pl25 pr25 brad-27 mt5 mb5"><i class="fa fa-angle-left" aria-hidden="true"></i> next</a>
                                    <a href="#" class="btn btn-warning pl25 pr25 brad-27 mt5 mb5">prev <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-2 pt10 pb10 br-lightgrey">
                                    <i class="fa fa-heart-o big text-danger" aria-hidden="true"></i> <span class="badge badge-pill badge-danger va-50">65</span>
                                </div>
                                <div class="col-4 pt10 pb10">
                                    <i class="fa fa-share-alt-square big" aria-hidden="true"></i>
                                    <i class="fa fa-facebook-square big" aria-hidden="true"></i>
                                    <i class="fa fa-twitter-square big" aria-hidden="true"></i>
                                    <i class="fa fa-google-plus-square big" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile ?>
            </div>
            <div class="col-lg-4 col-xl-4 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                <div class="mt35 pb35">
                    <h3>Category</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="/index.php?page=seeposts" class="nav-link font-weight-bolder black">All</a>
                        </li>
                        <?php  
                            $sql = "SELECT * FROM product_categories";
                            $categories_list = [];
                            $result = mysqli_query($db,$sql);
                            if(!$result){
                                echo 'Error: ' . mysqli_error($db);
                            }
                            while($recording=mysqli_fetch_assoc($result)) {
                                $category_name = $recording['name'];
                                $id = $recording['id'];
                                $categories_list[$id] = $category_name;
                            }
                        ?>
                         <?php  
                        foreach ($categories_list as $key => $value) : ?>
                                <li class="nav-item">
                                    <a class="nav-link font-weight-bolder black" href="/index.php?page=seeposts&CategoryID=<?php echo $key; ?>">
                                        <?php echo $value?>
                                    </a>
                                </li>
                        <?php endforeach; ?>
                    </ul> 
                </div>
                <div class="mt35 pb35">
                    <h3>Recent posts</h3>
                    <div class="row">
                        <div class="col-3">
                            <img src="https://via.placeholder.com/70x70" alt="70x70">
                        </div>
                        <div class="col-9">
                            <p class="text-black-50 text-uppercase pb0 mb0">08-nov-2016</p>
                            <h6>Lorem ipsum dolor sit amet, consectetur.</h6>
                        </div>
                        <div class="col-3">
                            <img src="https://via.placeholder.com/70x70" alt="70x70">
                        </div>
                        <div class="col-9">
                            <p class="text-black-50 text-uppercase pb0 mb0">08-nov-2016</p>
                            <h6>Lorem ipsum dolor sit amet, consectetur.</h6>
                        </div>
                        <div class="col-3">
                            <img src="https://via.placeholder.com/70x70" alt="70x70">
                        </div>
                        <div class="col-9">
                            <p class="text-black-50 text-uppercase pb0 mb0">08-nov-2016</p>
                            <h6>Lorem ipsum dolor sit amet, consectetur.</h6>
                        </div>
                    </div>
                </div>
                <div class="mt35 pb35">
                    <h3>Tags</h3>
                    <a href="#" class="btn btn-warning text-uppercase w-25 pb3 fs-14">Juice</a>
                    <a href="#" class="btn btn-warning text-uppercase w-50 pb3 fs-14">Vegetables</a> <br>
                    <a href="#" class="btn btn-warning text-uppercase w-50 mt3 fs-14">Special dishes</a>
                    <a href="#" class="btn btn-warning text-uppercase w-25 mt3 fs-14">lunch</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content end -->
<?php include 'footer.php'; ?>
