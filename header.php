<?php include 'server.php' ?>

<!-- Header.php begins -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Luxury Restaurant</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/margin.css">
	<link rel="stylesheet" href="css/padding.css">
	<link rel="stylesheet" href="css/style.css">    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Navbar begin -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
			<!-- Brand/logo -->
				<a class="navbar-brand" href="/index.php?page=home">Luxury Restaurant</a>

			<!-- Collapse -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
			<!-- Links -->
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav" style="margin: auto;">
					<li class="nav-item">
						<a class="nav-link" href="/index.php?page=home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/index.php?page=seeposts">Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/index.php?page=home#reservation">Reservation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#footer">Contact</a>
					</li>
					<li class="nav-item dropdown">
						<a href="/index.php?page=seeposts" data-toggle="dropdown" id='navbardrop' class="nav-link dropdown-toggle">Categories</a>
						<div class="dropdown-menu">
							<?php  
								$sql = "SELECT * FROM product_categories";
								$result = mysqli_query($db,$sql);
								if(!$result){
									echo 'Error: ' . mysqli_error($db);
									exit();
								}
								$categ_list = [];
								while($recording=mysqli_fetch_assoc($result)){
									$categories = $recording['name'];
									$id = $recording['id'];
									$categ_list[$id] = $categories;
								}
							?>
							<?php foreach ($categ_list as $key => $value) : ?>
								<a href="/index.php?page=seeposts&CategoryID=<?php echo $key ?>" class="dropdown-item">
									<?php echo $value; ?>
								</a>
							<?php endforeach ?>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a href="/index.php?page=profile" data-toggle="dropdown" class="dropdown-toggle nav-link">Account</a>
						<div class="dropdown-menu">
						<!-- Let user log in or sign up if he is not -->
							<?php if(!isset($_SESSION['username'])) : ?>
								<a href="login.php" class="nav-link black text-primary">Log in</a>
								<a href="register.php" class="nav-link black text-success">Sign up</a>
							<?php endif ?>
							<!-- User options if he logged in -->
							<?php if(isset($_SESSION['username'])) : ?>
								<a href="/logout.php?logout=1" class="nav-link black text-danger">Log out</a>
								<a href="/index.php?page=profile" class="nav-link black text-black-50">profile</a>
							<?php endif ?>
							</div>
						</li>
					<li class="nav-item">
						<a href="#" class="nav-link btn btn-large btn-warning">
							<i class="fas fa-utensils"></i> BOOK YOUR TABLE
						</a>
					</li>
				</ul>
			</div>
		</nav>
	<!-- Header.php ends -->