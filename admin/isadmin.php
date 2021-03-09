
<?php
	$db = mysqli_connect('localhost','holduser','UYtiuTI&*yt8Yiu','azizbek_hint');
	// $db = mysqli_connect('localhost', 'root', '', 'restaurant');

	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];	
	}
	else{
		$perms = 'none';
	}
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	if(!mysqli_query($db,$sql)) {
		echo 'Error:' . mysqli_error($db);
		exit();
	}
	$result = mysqli_query($db,$sql);
	$recording = mysqli_fetch_assoc($result);
	$perms = $recording['Permissions'];
	if($perms != 'admin') {
		include 'login.php';
		array_push($errors,'Not enough access');
		exit();
	}
?>