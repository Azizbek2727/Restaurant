<?php include 'header.php'; ?>
<?php
	if(isset($_GET['page'])){
		switch ($_GET['page']) {
			case 'sliders' :
				include 'tables/slider.php';
				break;
			case 'about' :
				include 'tables/about.php';
				break;
			case 'products' :
				include 'tables/products.php';
				break;
			case 'menu' :
				include 'tables/menu.php';
				break;
			case 'feedback' :
				include 'tables/feedback.php';
				break;
			case 'reservation' :
				include 'tables/reservation.php';
				break;
			case 'socials' :
				include 'tables/socials.php';
				break;
			case 'posts.php' :
				include 'tables/posts.php';
				break;
			case 'users' :
				include 'tables/users.php';
				break;
			case 'aboutupdate' :
				include 'tables/aboutupdate.php';
				break;
			case 'detail' :
				include 'tables/detail-image.php';
				break;
			case 'login' :
				include 'login.php';
				break;
			case 'home' :
				include 'home.php';
				break;
 			default :
 				include '404.php';
 				break;
		}
	}
	else{
		if(!isset($_SESSION['username'])) {
			include 'login.php';
		}
		else{
			include 'home.php';
		}
	}
	if(isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location:/admin/index.php');
	}
?>
<?php include 'footer.php'; ?>