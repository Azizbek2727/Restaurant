<?php 
	session_start();
	// variable declaration

	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	// $db = mysqli_connect('localhost', 'root', '', 'restaurant');
	$db = mysqli_connect('localhost','holduser','UYtiuTI&*yt8Yiu','azizbek_hint');

	// LOGIN USER
	if (isset($_POST['login_admin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND Permissions = 'admin'";
			$results = mysqli_query($db, $query);
			if(mysqli_num_rows($results) == 1 ) {
				$recording = mysqli_fetch_assoc($results);
				$perms = $recording['Permissions'];
				if($perms != 'admin'){
					array_push($errors,'Not enough access');
				}
				if($perms == 'admin'){
					$_SESSION['username'] = $username;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
?>
