<?php include '../header.php'; ?>
<?php  
	// For image
		if(isset($_GET['image'])) :
			// Insert
				if(isset($_GET['insert'])) :
					include 'uploadmanual.php';
					$img = $target_file;
					$sql = "INSERT INTO detail_image (image) VALUES ('$img')";
					$result = mysqli_query($db,$sql);
					if(!$result){
						echo 'Error: ' . mysqli_error($db);
						header('location:/admin/index.php?page=detail&sucess=0');
						exit();
					}
					else{
						header('location:/admin/index.php?page=detail&sucess=1');
						exit();
					}
				endif;
			// Delete
				 if(isset($_GET['delete'])) :
				 	$id = $_POST['id'];
					$sql = "DELETE FROM detail_image WHERE id = $id";
					$result = mysqli_query($db,$sql);
					if(!$result){
						header('location:/admin/index.php?page=detail&sucess=0');
						exit();
					}
					else{
						header('location:/admin/index.php?page=detail&sucess=1');
						exit();
					}
				endif;
		endif;
?>