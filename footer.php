<!-- Footer.php begins -->
  <div class="bg-dark pb50" id = "footer">
        <div class="container bg-dark pt50 white">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 pb20">
                    <h3 class="pb15">Navigation</h3>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link pb0 pt5" href="/index.php?page=home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb0 pt5" href="/index.php?page=home#about">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb0 pt5" href="/index.php?page=seeposts">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb0 pt5" href="/index.php?page=home#reservation">Reservation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb0 pt5" href="https://t.me/hero27">Contact us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 pb20">
                    <h3 class="pb15">News letter</h3>
                    <p>Enter your email adress and subscribe daily newsletter</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Email" id="demo" name="email">
                        <div class="input-group-append">
                            <button class="btn btn-warning text-uppercase">subscribe</button>
                        </div>
                    </div>
                    <!-- <i class="fa fa-facebook-official big" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square big" aria-hidden="true"></i>
                    <i class="fa fa-google-plus-square big" aria-hidden="true"></i> -->
                    <?php  
                        $sql = "SELECT * FROM socials";
                        $result = mysqli_query($db,$sql);
                        if(!$result){
                            echo 'Error: ' . mysqli_error($db);
                            exit();
                        }
                        while($recording = mysqli_fetch_assoc($result)) :
                            $social_link = $recording['social_link'];
                            $social_icon = $recording['social_icon'];
                            $social_name = $recording['social'];
                    ?>
                    <a class="white btn pt0 pb0 pr5 pl5 m1" target="_blank" href="<?php echo $social_link; ?>">
                        <i class="fa <?php echo $social_icon; ?> big" aria-hidden="true"></i>
                    </a>
                    <?php endwhile  ?>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 pb20 text-center text-sm-center text-md-center text-lg-left text-xl-left">
                    <h3 class="pb15">Our app available</h3>
                    <p class="text-dark">Our app is not availabe, idi nafig!</p>
                    <img src="http://itv.uz/application/images/itunes-app.png" class="_150x45" alt="available on app store">
                    <img src="http://itv.uz/application/images/ru-play-badge.png" class="_150x45" alt="available on play market">
                </div>
            </div>
        </div>
        <div class="container bg-dark white text-center bt-lightgrey">
            <div class="mt10">
                <h3>Attention!</h3>
                <p>It is not the final version of the site</p>
                <p>Maybe I will finish it later</p>
            </div>
        </div>
    </div>
</body>
</html>
<!-- Footer end -->