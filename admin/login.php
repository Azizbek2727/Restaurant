<div class="container mt35 pb35">
	<?php if(isset($_SESSION['username'])) :?>
		<h1>Alredy logged in</h1>
		<a href="/admin/index.php?page=home" class="btn btn-primary">Go home</a>
		<a href="/admin/index.php?logout=1"  class="btn btn-danger">Log out</a>
	<?php endif ?>
	<?php if(!isset($_SESSION['username'])) : ?>
		<h1 class="text-center">Log in</h1>
	<form action="/admin/index.php?page=login.php" method="post">
		<?php include 'errors.php'; ?>
		<div class="form-group">
			<label for="username"><p class="black">Username: </p></label>
			<input type="text" class="form-control" autocomplete="off" name="username">
		</div>
		<div class="form-group">
			<label for="password"><p class="black">Password: </p></label>
			<input type="password" class="form-control" autocomplete="off" name="password">
		</div>
		<button class="btn btn-primary" type='input' name="login_admin">Log in</button>
		<p class='white d-inline'>Not yet a member?</p> <a href="register.php" class="btn btn-success">Sign Up</a>
	</form>
	<?php endif ?>
</div>