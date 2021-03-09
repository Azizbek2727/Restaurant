<?php include '../header.php'; ?>
<?php  
	$username = $_SESSION['username']; 
	// Insert
		if(isset($_GET['insert'])) :
		$soc_name = $_POST['soc-name'];
		$soc_link = $_POST['soc-link'];
		$soc_icon = $_POST['soc-icon'];
		$created_at = date("Y-m-d");
		$sql = "INSERT INTO socials (social,social_link,social_icon,created_at,created_by,updated_by)
		VALUES('$soc_name','$soc_link','$soc_icon','$created_at','$username','$username')";
		if(!mysqli_query($db,$sql)) {
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=socials&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=socials&sucess=1');	
			exit();
		}
		endif;
	// Update
		if(isset($_GET['update'])):
		$id = $_POST['id'];
		$soc_name = $_POST['soc-name'];
		$soc_link = $_POST['soc-link'];
		$soc_icon = $_POST['soc-icon'];
		$sql = "UPDATE socials SET social = '$soc_name',social_link = '$soc_link',social_icon = '$soc_icon' WHERE id = $id ";
		if(!mysqli_query($db,$sql)) {
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=socials&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=socials&sucess=1');	
			exit();
		}
		endif;
	// Delete
		if(isset($_GET['delete'])):
		$id = $_POST['id'];
		$sql = "DELETE FROM socials WHERE id = $id";
		if(!mysqli_query($db,$sql)) {
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=socials&sucess=0');
			exit();
		}
		else{
			header('location:/admin/index.php?page=socials&sucess=1');	
			exit();
		}
		endif;
?>