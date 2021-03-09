
<?php include 'header.php'; ?>
<div class="container mt35 pb35">
	<div class="jombotron">
		<div class="h1 text-center">Register</div>
		<form action="register.php" method="post">
			<?php include 'errors.php'; ?>
			<div class="form-group">
				<label for="Login">Login: </label>
				<input type="text" placeholder="Enter your login" required="" class="form-control" autocomplete="off" name="username" value="<?php echo $username;?>">
			</div>
			<div class="form-group">
				<label for="Email">Email: </label>
				<input type="email" placeholder="Enter your email" required="" class="form-control" autocomplete="off" name="email" value="<?php echo $email;?>">
			</div>
			<div class="form-group">
				<label for="password">Password :</label>
				<input type="password" placeholder="Enter your password" required="" class="form-control" autocomplete="off" name="password_1">
			</div>
			<div class="form-group">
				<label for="password confirm">Confrim password :</label>
				<input type="password" placeholder="Repeat your password" required="" class="form-control" autocomplete="off" name="password_2">
			</div>
			<input type="text" hidden="" value="1" name="reg_user">
			<button type="submit" class="btn btn-success">Sign Up</button>
			<p class='black d-inline'>Already a member? </p>
			<a href="login.php" class="btn btn-primary">Log in</a>
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>