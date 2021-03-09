<?php include 'server.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Luxury Restaurant</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/margin.css">
    <link rel="stylesheet" href="../css/padding.css">
    <link rel="stylesheet" href="../css/style.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  	<!-- Brand/logo -->
  	<a class="navbar-brand" href="/admin/index.php?page=home"><?php if(isset($_SESSION['username'])) {echo 'Welcome, '.$_SESSION['username'];} else{echo 'Home';} ?></a>
  
  	<!-- Links -->
  	<?php if(isset($_SESSION['username'])) : ?>
  	<ul class="navbar-nav mr-auto">
    	<li class="nav-item">
      		<a class="nav-link" href="/admin/index.php?page=sliders">Sliders</a>
    	</li>
    	<li class="nav-item">
      		<a class="nav-link" href="/admin/index.php?page=about">About</a>
    	</li>
    	<li class="nav-item">
      		<a class="nav-link" href="/admin/index.php?page=products">Products</a>
    	</li>
    	<li class="nav-item">
    		<a href="/admin/index.php?page=feedback" class="nav-link">Feedbacks</a>
    	</li>
    	<li class="nav-item">
    		<a href="/admin/index.php?page=reservation" class="nav-link">Reservation</a>
    	</li>
    	<li class="nav-item">
    		<a href="/admin/index.php?page=socials" class="nav-link">Socials</a>
    	</li>
    	<li class="nav-item">
    		<a href="/admin/index.php?page=users" class="nav-link">Users</a>
    	</li>
        <li class="nav-item">
            <a href="/admin/index.php?page=detail" class="nav-link">Detail</a>
        </li>
    </ul>
<?php endif ?>
    <ul class="navbar-nav ml-auto">
    	<?php if(isset($_SESSION['username'])) : ?>
    		<li class="nav-item float-right">
    			<a href="/admin/index.php?logout=1" class="nav-link text-danger">Log out</a>
    		</li>
    	<?php endif ?>
  	</ul>
</nav>
<?php include 'isadmin.php' ?>