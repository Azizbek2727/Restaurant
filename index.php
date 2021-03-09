<?php include 'header.php'; ?>
<?php 
	if(isset($_GET['page'])) {
		switch ($_GET['page']) {
			case 'seeposts' :
				include "seeposts.php";
				break;
			case 'home' :
				include 'home.php';
				break;
			case 'login' :
				include 'login.php';
				break;
			default:
				include '404.php';
				break;
		}
	}
	else{
		include 'home.php';
	}
?>
<?php include 'footer.php'; ?>
