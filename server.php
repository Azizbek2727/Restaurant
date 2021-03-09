<?php 
	session_start();
	// variable declaration
	$username = "";
	$email    = "";
	$errors = [];
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'restaurant');
// Check connection
//if (!$db) {
//    die("Connection failed: " . mysqli_connect_error());
//}
echo "Connected successfully";
	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
			$username = mysqli_real_escape_string($db, $_POST['username']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
			$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
			
		// form validation: ensure that the form is correctly filled
			if (empty($username)) { array_push($errors, "Username is required"); }
			if (empty($email)) { array_push($errors, "Email is required"); }
			if (empty($password_1)) { array_push($errors, "Password is required"); }
		
		// Checking if username already exists
		$sql = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
		$result = mysqli_query($db,$sql);
			if(!$result) {
				// echo 'Error: ' . mysqli_error($db);
				array_push($errors, mysql_error($db));
				exit();
			}
			if($recording = mysqli_fetch_assoc($result) > 0){
				array_push($errors,"Username or Email already exists");
				// $recording = mysqli_fetch_assoc($result);
			}
			//Comparing passwords
			if ($password_1 != $password_2) {
				array_push($errors, "Passwords do not match");
				// var_dump($errors);
			}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password,Permissions) 
					  VALUES('$username', '$email', '$password','user')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		//Receiving data
			$username = mysqli_real_escape_string($db, $_POST['username']);
			$password = mysqli_real_escape_string($db, $_POST['password']);

		// Validating data
			if (empty($username)) {
				array_push($errors, "Username is required");
			}
			if (empty($password)) {
				array_push($errors, "Password is required");
			}
		// Logging in if no errors
			if (count($errors) == 0) {
				$password = md5($password);
				$query = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
				$results = mysqli_query($db, $query);
				if(!$results){
					array_push($errors,mysqli_error($db));
				}
				if (mysqli_num_rows($results) == 1) {
					$_SESSION['username'] = $username;
					$_SESSION['success'] = "You are now logged in";
					header('location: index.php');
				}else{
					array_push($errors, "Wrong username/password combination");
				}
			}
	}
?>