<?php include 'header.php'; ?>
<div class="container mt70 pb150">
		<?php if(isset($_SESSION['username'])) :?>
			<h1>Alredy logged in</h1>
			<a href="/index.php?page=home" class="btn btn-primary">Go home</a>
			<a href="/logout.php?logout=1" class="btn btn-danger">Log out</a>
		<?php endif ?>
		<?php if(!isset($_SESSION['username'])) : ?>
			<?php include 'errors.php'; ?>
			<form action="login.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="username"><p class="white">Username: </p></label>
					<input type="text" class="form-control" required="" autocomplete="off" name="username">
				</div>
				<div class="form-group">
					<label for="password"><p class="white">Password: </p></label>
					<input type="password" class="form-control" required="" autocomplete="off" name="password">
				</div>
				<input type="text" hidden="" value="login_user" name="login_user">
				<button class="btn btn-primary" type='submit'>Log in</button>
				<p class='white d-inline'>Not yet a member?</p> <a href="register.php" class="btn btn-success">Sign Up</a>
			</form>
		<?php endif ?>
</div>
<?php include 'footer.php'; ?>