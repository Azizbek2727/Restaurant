<?php include '../header.php'; ?>
<?php $username = $_SESSION['username'];?>
<?php
	// Insert
		if(isset($_GET['insert'])){
		include 'uploadmanual.php';
		$name = $_POST['name'];
		$content = $_POST['content'];
		$image = $target_file;
		$created_at = date("Y-m-d");
		if(isset($_POST['rating'])){
			$rating = $_POST['rating'];
		}
		else{
			$rating = 5;
		}
		$status = $_POST['status'];
		if($status == 'on'){
			$status = 1;
		}
		else{
			$status = 0;
		}
		$sql = "INSERT INTO feedback (name,content,image,star_count,created_at,created_by,updated_by,status)
		VALUES('$name', '$content', '$image',$rating, '$created_at', '$username', '$username', $status)";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=feedback&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=feedback&sucess=1');	
			exit();
		}
		}
	// Update
		if(isset($_GET['update'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$content = $_POST['content'];
		$created_at = date("Y-m-d");
		if(isset($_POST['rating'])){
			$rating = $_POST['rating'];
		}
		else{
			$rating = 5;
		}
		$status = $_POST['status'];
		if($status == 'on'){
			$status = 1;
		}
		else{
			$status = 0;
		}
		if($_FILES['fileToUpload']['size'][0] > 0){
			$image = $target_file;
		}
		else{
			$image = $_POST['oldimage'];
		}
		$sql = "UPDATE feedback SET name = '$name',content = '$content',image = '$image',star_count = $rating,updated_by = '$username',status = $status WHERE id = $id ";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=feedback&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=feedback&sucess=1');
			exit();
		}
		}
	// Delete
		if(isset($_GET['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM feedback WHERE id = $id";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=feedback&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=feedback&sucess=1');	
			exit();
		}
		}
?>