    <style>
        .avatar{
            width: 75px;
            height: 75px;
        }
    </style>
<!-- Home.php begins --> 
        <!-- Carousel.php begins -->
            <div id="demo" class="carousel slide d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block" data-ride="carousel">
                <?php  
                    $sql = "SELECT COUNT(id) FROM slider";
                    $result = mysqli_query($db,$sql);
                    if(!$result){
                        echo 'Error: ' . mysqli_error($db);
                        exit();
                    }
                    $recording = mysqli_fetch_assoc($result);
                    $recsum = $recording['COUNT(id)'];
                    $sql = "SELECT active FROM slider";
                    $result = mysqli_query($db,$sql);
                    if(!$result){
                        echo 'Error: ' . mysqli_error($db);
                        exit();
                    }
                    $recording = mysqli_fetch_assoc($result);
                    $active = htmlspecialchars($recording['active']);

                ?>
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <?php for($i = 0; $i < $recsum; $i++) : ?>
                        <li data-target="#demo" data-slide-to="<?php echo $i; ?>" class="<?php echo $active ?>"></li>
                    <?php endfor ?>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                <?php  
                $sql = "SELECT * FROM slider";
                $result = mysqli_query($db,$sql);
                if(!$result){
                    echo 'Error :' . mysqli_error('db');
                }
                while($recording=mysqli_fetch_assoc($result)) :
                    $img = htmlspecialchars($recording['image']);
                    $title = htmlspecialchars($recording['title']);
                    $description = htmlspecialchars($recording['description']);
                    $active = htmlspecialchars($recording['active']);
                ?>
                    <div class="carousel-item pos-r <?php echo $active; ?>">
                        <img src="<?php echo $img; ?>" alt="IMAGE 1970 X 570" class="w-100 h-420" >
                        <div class="carousel-caption text-left pos-a top-40">
                            <h1><?php echo $title; ?></h1>
                            <h4><?php echo $description; ?></h4>
                        </div>
                    </div>
                <?php endwhile ?>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

        <!-- Reviews and Home Delievery line begin -->
                <div class="container-fluid bg-lightgrey">
                <div class="row pt15 pb15">
                    <div class="col-4 col-sm-4 col-md-6 col-lg-6 pt10 pb10 text-sm-left text-md-right text-lg-right text-xl-right">
                        <i class="fa fa-comments big va-30" aria-hidden="true"></i>
                        <p class="d-inline-block pb0 mb0 text-left">Read <br> <span class="text-warning font-weight-bolder">Reviews</span></p>
                    </div>

                    <div class="col-8 col-sm-8 col-md-6 col-xl-6 pt10 pb10 text-sm-center text-md-left text-lg-left text-xl-left">
                        <i class="fa fa-mobile big va-25" aria-hidden="true"></i>
                        <p class="d-inline-block pb0 mb0 text-uppercase border-right pr20 ">call us now for <br> <span class="text-warning font-weight-bolder">Home delievery</span> </p>
                        <h4 class="d-inline-block va-35">1-008 006 005</h4>                
                    </div>
                </div>
                </div>
        <!-- Reviews and Home Delievery line end -->

        <!-- About restaurant begin -->
            <?php  
                $about = "SELECT * FROM about LIMIT 1";
                $result = mysqli_query($db,$about);
                if(!$result){
                    $error = mysqli_error($db);
                    echo 'Error :' . $error;
                    exit();
                }
            ?>
            <?php 
                while($recording=mysqli_fetch_assoc($result)) {
                    $title = htmlspecialchars($recording['title']);
                    $description = htmlspecialchars($recording['description']);
                    $content = htmlspecialchars($recording['content']);
                    $created_at = htmlspecialchars($recording['created_at']);
                    $img1 = htmlspecialchars($recording['image_1']);
                    $img2 = htmlspecialchars($recording['image_2']);
                    $img3 = htmlspecialchars($recording['image_3']);
                    $img4 = htmlspecialchars($recording['image_4']);
                }           
            ?>
            <style>
                ._270x150{
                    width: 270px;
                    height: 150px;
                }
            </style>        
            <div class="container mt40 pb60" id = "about">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb20">
                        <h2 class="pb15"><?php echo $title; ?></h2>
                        <p><?php echo $description; ?></p>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn btn-warning text-uppercase">read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb20">
                        <div class="row text-center text-xs-left text-sm-left text-lg-left text-xl-left h-100">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 pr3 pl3">
                                <div class="invisible d-none d-xs-none d-sm-block d-lg-block d-xl-block h-20p align-top"></div>
                                <img src="<?php echo $img1; ?>" class="pt3 pb3 _270x150"  alt="270x150 IMAGE"> <br>
                                <img src="<?php echo $img2; ?>" class="pt3 pb3 _270x150"  alt="270x150 IMAGE">
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 pr3 pl3">
                                <img src="<?php echo $img3; ?>" class="pt3 pb3 _270x150"  alt="270x150 IMAGE"> <br>
                                <img src="<?php echo $img4; ?>" class="pt3 pb3 _270x150"  alt="270x150 IMAGE">
                                <div class="invisible d-none d-xs-none d-sm-block d-lg-block d-xl-blockh-20p align-bottom" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- About restaurant end -->

        <!-- Today Special begin -->
            <div>
                <div id="demo2" class="carousel slide d-none d-xs-none d-sm-none d-md-none d-lg-block d-xl-block" data-ride="carousel" >
                    <?php  
                        $sql = "SELECT COUNT(id) FROM slider_2nd";
                        $result = mysqli_query($db,$sql);
                        if(!$result){
                            echo 'Error: ' . mysqli_error($db);
                            exit();
                        }
                        $recording = mysqli_fetch_assoc($result);
                        $recsum = $recording['COUNT(id)'];
                        $sql = "SELECT active FROM slider_2nd";
                        $result = mysqli_query($db,$sql);
                        if(!$result){
                            echo 'Error: ' . mysqli_error($db);
                            exit();
                        }
                        $recording = mysqli_fetch_assoc($result);
                        $active = htmlspecialchars($recording['active']);
                    ?>
                    <!-- Indicators -->
                    <ul class="carousel-indicators justify-content-start top-0" style="top:0;">
                        <?php for($i=0;$i < $recsum; $i++) : ?>
                            <li data-target="#demo2" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                        <?php endfor ?>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php  
                        $sql = "SELECT * FROM slider_2nd";
                        $result = mysqli_query($db,$sql);
                        if(!$result){
                            echo 'Error :' . mysqli_error('db');
                        }
                        while($recording=mysqli_fetch_assoc($result)) :
                            $img = htmlspecialchars($recording['image']);
                            $title = htmlspecialchars($recording['title']);
                            $active = htmlspecialchars($recording['active']);
                        ?>
                            <div class="carousel-item <?php echo $active; ?>" style="height: 440px;">
                                <img src="<?php echo $img; ?>" alt="IMAGE 1970 X 570" class="w-100 h-420">
                                <div class="carousel-caption text-left pos-a top-25">
                                    <h1><?php echo $title; ?></h1>
                                </div>
                            </div>
                        <?php endwhile ?>
                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo2" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <div class="container text-center mt-5 mt-lg-n10">
                    <h3 class="white">Today Special</h3>
                    <div class="row">
                        <?php  
                            $sql = "SELECT * FROM foods WHERE category_id = 5 LIMIT 2";
                            $result = mysqli_query($db,$sql);
                            if(!$result){
                                echo 'Error: ' . mysqli_error($db); 
                            }
                        ?>
                        <?php
                            while($recording=mysqli_fetch_assoc($result)) :
                                $name = htmlspecialchars($recording['name']);
                                $description = htmlspecialchars($recording['description']);
                                $cost = htmlspecialchars($recording['cost']);
                                $img = htmlspecialchars($recording['img']);
                        ?>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pb20">
                            <div class="shadow-lg" style="height: 668px;">
                                <img class="w-100" src="<?php echo $img; ?>" alt="569x420">
                                <h3 class="mt30"><?php echo $name; ?></h3>
                                <p class="pb35 d-inline-block pl30 pr30"><?php echo mb_substr($description,0,255).'...'; ?></p>
                                <p class="w-90-ml-5 bb-lightgrey"></p>
                                <div class="text-left w-90-ml-5">
                                    <p class="d-inline-block text-left pr15 br-lightgrey">Home <br> <span class="pink">Delievery</span></p>
                                    <h3 class="d-inline-block pl10 va-25">1-008 007 009</h3>
                                    <h4 class="text-warning d-inline-block float-right align-middle">$<?php echo $cost; ?></h4> 
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                    </div>
                </div>
            </div>
        <!-- Today special end  -->

        <!-- Food menu begin -->
            <div class="container text-center">
            <h2>Food Menu</h2>
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
            <ul class="nav text-center justify-content-center">
                <li class="nav-item">
                    <i class="fa fa-bars text-warning" aria-hidden="true"></i>
                    <a class="nav-link font-weight-bolder black" href="/index.php?page=seeposts">All</a>
                </li>
                <?php  
                    foreach ($categories_list as $key => $value) :
                ?>
                        <li class="nav-item">
                            <i class="fa fa-bars text-warning" aria-hidden="true"></i>
                            <a class="nav-link font-weight-bolder black" href="/index.php?page=seeposts&CategoryID=<?php echo $key; ?>">
                                <?php echo $value?>
                                    
                                </a>
                        </li>
                <?php    
                    endforeach;
                ?>
            </ul>
            <p class="bt-lightgrey"></p>
            <div class="row mt55">
                <?php 
                $query = "SELECT * FROM foods ORDER BY ID DESC LIMIT 8";
                $result = mysqli_query($db, $query);
                if (!$result) {
                    $error = 'home.php Error fetching data: ' . mysqli_error($db);
                    echo $error;
                    exit();
                }
                while($recording=mysqli_fetch_assoc($result)) :
                    $name = htmlspecialchars($recording['name']);
                    $description = htmlspecialchars($recording['description']);
                    $cost = htmlspecialchars($recording['cost']);
                    $img = htmlspecialchars($recording['img']);
                ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">
                            <div class="row">
                                <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                    <h5 class="d-inline-block text-uppercase"><?php echo $name; ?></h5> <br>
                                    <p class="d-inline-block"><?php echo mb_substr($description,0,50) . '...'; ?></p>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <h3 class="d-inline-block text-warning">$<?php echo $cost;?></h3>
                                </div>
                            </div>
                            <p class="bb-lightgrey"></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="container-fluid text-center">
                <a href="#" class="btn btn-warning text-uppercase white">explore food menu</a>
            </div>
            </div>
        <!-- Food menu ends -->

        <!-- Happy Clients begin -->
            <div id="happyClients" class="carousel slide mt50 d-none d-sm-none d-md-block d-lg-block dl-xl-block" data-ride="carousel">
            <ul class="carousel-indicators">
                <!-- <li data-target="#happyClients" data-slide-to="0" class="active"></li> -->
            
            <?php  
                $sql = "SELECT COUNT(id) FROM feedback";
                $result = mysqli_query($db,$sql);
                if(!$result){
                    echo 'Error: ' . mysqli_error($db);
                    exit();
                }
                $recording = mysqli_fetch_assoc($result);
                $recsum = $recording['COUNT(id)'];
                $sql = "SELECT active FROM feedback";
                $result = mysqli_query($db,$sql);
                if(!$result){
                    echo 'Error: ' . mysqli_error($db);
                    exit();
                }
                $recording=mysqli_fetch_assoc($result);
                $active = htmlspecialchars($recording['active']);
                for($i = 0; $i <  $recsum; $i++) :
            ?>
                <li data-target="#happyClients" data-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>">
                    <?php echo $i; ?> 
                </li>
            <?php endfor ?>
            <!-- Indicators
                <li data-target="#happyClients" data-slide-to="" class="active"></li>
                <li data-target="#happyClients" data-slide-to="1"></li>
                <li data-target="#happyClients" data-slide-to="2"></li> -->
            </ul>

            <!-- The slideshow -->
                <div class="carousel-inner">
                    <?php  
                        $sql = "SELECT * FROM feedback WHERE status = 1";
                        $result = mysqli_query($db,$sql);
                        if(!$result){
                            echo 'Error: ' . mysqli_error($db);
                            exit();
                        }
                        while($recording = mysqli_fetch_assoc($result)) :
                            $name = htmlspecialchars($recording['name']);
                            $content = htmlspecialchars($recording['content']);
                            $image = htmlspecialchars($recording['image']);
                            $rating = htmlspecialchars($recording['star_count']);
                            $active = htmlspecialchars($recording['active']);
                    ?>
                        <div class="carousel-item <?php echo $active; ?>">
                            <img src="https://images.wallpaperscraft.com/image/gradient_pink_shades_130856_1920x1080.jpg" class="w-100 h-420" alt="BG_IMAGE">
                            <div class="carousel-caption top-25">
                                <h2 class="white">Happy Client</h2>
                                <p><?php echo $content; ?></p>
                                <img src="<?php echo $image; ?>"  alt="image" class="rounded-circle avatar">
                                <p class="pb0 mb0 white"><?php echo $name; ?></p>
                                <?php for($i = 0; $i < $rating; $i++) : ?>
                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endwhile ?>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#happyClients" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>

                    <a class="carousel-control-next" href="#happyClients" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        <!-- Happy Clients end -->

        <!-- Reserve your table begin -->
            <div class="container text-center mt60 pb80" id = "reservation">
                <h1>Reserve your table</h1>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <?php  
                            $sql = "SELECT * FROM reservation_image";
                            $result = mysqli_query($db,$sql);
                            $recording = mysqli_fetch_assoc($result); 
                            $img = $recording['image'];
                        ?>
                        <img src="<?php echo $img; ?>" alt="559X334 IMAGE">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <?php $disabled = ""; ?>
                        <?php if(isset($_GET['success_reserved'])) :
                            $disabled = 'disabled';
                        ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Table reserved!
                            </div>
                        <?php endif ?>
                        <?php if(isset($_GET['fail_reserved'])) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Fail!</strong>Please,contact to administrator.
                            </div>
                        <?php endif ?>
                        <form action="/admin/reservation-insert.php?insert=1" method="post" enctype="multipart/form-data">
                        <div class="row row-cols-2">
                            <div class="col p15v">
                                <input type="text" class="inputs" required="" name="name" placeholder="Name*">    
                            </div>
                            <div class="col p15v">
                                <input type="date" class="inputs" required="" name="date" placeholder="Date*">    
                            </div>
                            <div class="col p15v">
                                <input type="time" class="inputs" required="" name="time" placeholder="Time*">    
                            </div>
                            <div class="col p15v">
                                <input type="email" class="inputs" required="" name="email" placeholder="Email Adress*">
                            </div>
                            <div class="col p15v">
                                <input type="number" class="inputs" required="" name="guests" placeholder="Guests**">    
                            </div>
                            <div class="col p15v">
                                <input type="tel" class="inputs" required="" name="tel-num" pattern="1-[0-9]{3}-[0-9]{3}-[0-9]{3}" placeholder="Phone number*">
                            </div>
                        </div>
                        <div class="row row-cols-3">
                            <div class="col">
                                <button class="btn btn-warning text-uppercase white fs-14" type="submit">make reservation</button>
                            </form>
                            </div>
                            <div class="col">
                                <p class="d-inline-block text-uppercase font-weight-bolder pr15 br-lightgrey fs-12">You can also call <br> <span class='pink'>for a reservation</span></p>
                            </div>
                            <div class="col">
                                <h4>1-007 006 005</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Reserve your table end -->
<!-- Home.php ends