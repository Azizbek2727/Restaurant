<?php include '../header.php'; ?>
<?php
	// For permissions
		if(isset($_GET['perms'])) :
			// Insert
				if(isset($_GET['insert'])) :
					$name = $_POST['name'];
					$sql = "INSERT INTO perms_list (perm_name) VALUES ('$name')";
					$result = mysqli_query($db,$sql);
					if(!$result){
						// echo 'Error: ' . mysqli_error($db);
						header('location:/admin/index.php?page=users&sucess=0');
						exit();
					}
					else{
						header('location:/admin/index.php?page=users&sucess=1');
						exit();
					}
				endif;
			// Update
				if(isset($_GET['update'])) :
					$id = $_POST['id'];
					$name = $_POST['newname'];
					$sql = "UPDATE perms_list SET perm_name = '$name' WHERE perm_id = $id ";
					$result = mysqli_query($db,$sql);
					if(!$result){
						// echo 'Error: ' . mysqli_error($db);
						header('location:/admin/index.php?page=users&sucess=0');
						exit();
					}
					else{
						header('location:/admin/index.php?page=users&sucess=1');
						exit();
					}
				endif;
			// Delete
				if(isset($_GET['delete'])) :
					$id = $_POST['id'];
					$sql = "DELETE FROM perms_list WHERE perm_id = $id";
					$result = mysqli_query($db,$sql);
					if(!$result){
						// echo 'Error: ' . mysqli_error($db);
						header('location:/admin/index.php?page=users&sucess=0');
						exit();
					}
					else{
						header('location:/admin/index.php?page=users&sucess=1');
						exit();
					}
				endif;
		endif;
	// For users
		if(isset($_GET['users'])) :
		// Update (only for perms)
			if(isset($_GET['update'])) :
				$username = $_POST['username'];
				$perm = $_POST['permission'];
				$sql = "UPDATE users SET Permissions = '$perm' WHERE username = '$username'";
				$result = mysqli_query($db,$sql);
				if(!$result){
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=users&sucess=0');
					exit();
				}
				else{
					header('location:/admin/index.php?page=users&sucess=1');
					exit();
				}
			endif;
		// Delete
			if(isset($_GET['delete'])) :
				$username = $_POST['username'];
				$sql = "DELETE FROM users WHERE username = '$username'";
				$result = mysqli_query($db,$sql);
				if(!$result){
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=users&sucess=0');
					exit();
				}
				else{
					header('location:/admin/index.php?page=users&sucess=1');
					exit();
				}
			endif;
		endif;
?>