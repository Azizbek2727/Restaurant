<?php  
include '../header.php';
//Categories
	if(isset($_GET['categories'])) :
	//Categories Insert
		if(isset($_POST['category_name'])) {
		$category_name = $_POST['category_name'];
		$sql = "INSERT INTO product_categories (name) VALUES ('$category_name')";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');	

		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');	

		}
		exit();
		}
	// Categories Update
		if(isset($_GET['update'])) {
		$newname = $_POST['newname'];
		$id = $_POST['id'];
		$sql= "UPDATE product_categories SET name='$newname' WHERE id = $id";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');	
			exit();
		}
		}
	// Categories Delete 
		if(isset($_GET['delete'])) {
		$id = $_POST['id'];
		$sql= "DELETE FROM product_categories WHERE id=$id";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');	
			exit();
		}
		}
	endif;
//Types
	if(isset($_GET['types'])) : 
	// Types Insert
		if(isset($_POST['type_name'])) {
		$type_name = $_POST['type_name'];
		$sql = "INSERT INTO product_types (name) VALUES ('$type_name')";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');	
		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');	
			exit();
		}
		}
	// Types Update
		if(isset($_GET['update'])) {
		$newname = $_POST['newname'];
		$id = $_POST['id'];
		$sql= "UPDATE product_types SET name='$newname' WHERE id = $id";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');	
			exit();
		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');	
			exit();
		}
		}
	// Types Delete	
		if(isset($_GET['delete'])) {
		$id = $_POST['id'];
		$sql= "DELETE FROM product_types WHERE id=$id";
		if(!mysqli_query($db,$sql)){
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=products&sucess=0');
			exit();	
		}
		else{
			header('location:/admin/index.php?page=products&sucess=1');
			exit();
		}
		}
	endif;
//Products 
	if(isset($_GET['products'])) :
		// Products Insert
			if(isset($_GET['insert'])) {
				include 'uploadmanual.php';
				$name = $_POST['product_name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$cat_id = $_POST['category'];
				$type_id = $_POST['type'];
				$img = $target_file;
				$status = $_POST['status'];
					if($status == 'on'){
						$status = 1;
					}
					elseif($status == 'off'){
						$status = 0;
					}
					else{
						$status = 0;
					}
				$username = $_SESSION['username'];
				$created_at = date("Y/m/d");
				$sql = "INSERT INTO foods (name, description, cost, category_id, type_id, img, created_at, created_by,updated_by, status ) VALUES ( '$name', '$description', $price, $cat_id, $type_id, '$img', '$created_at', '$username', '$username' , $status)";
				if(!mysqli_query($db,$sql)){
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=products&sucess=0');
					exit();	
				}
				else{
					header('location:/admin/index.php?page=products&sucess=1');
					exit();
				}
			}	
		// Product Updated
			if(isset($_GET['update'])) {
				$id = $_POST['id'];
				$name = $_POST['product_name'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$cat_id = $_POST['category'];
				$type_id = $_POST['type'];
				$status = $_POST['status'];
					if($status == 'on'){
						$status = 1;
					}
					elseif($status == 'off'){
						$status = 0;
					}
					else{
						$status = 1;
					}
				$username = $_SESSION['username'];
				//If uploaded image
				if($_FILES['fileToUpload']['size'][0] > 0){
					include 'uploadmanual.php';
					$img = $target_file;
				}
				//Else
				else{
					$img = $_POST['oldimage'];
				}
				$updated_at = date("Y/m/d");
				$sql = "UPDATE foods SET 
				name = '$name', description = '$description',cost = '$price',category_id = $cat_id,type_id = $type_id, img = '$img', status = $status,updated_at = '$updated_at' WHERE id = $id ";
				if(!mysqli_query($db,$sql)){
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=products&sucess=0');
					exit();	
				}
				else{
					header('location:/admin/index.php?page=products&sucess=1');	
					exit();
				}
			}
		// Product Delete
			if(isset($_GET['delete'])) {
				$id = $_POST['id'];
				$sql = "DELETE FROM foods WHERE id = $id";
				if(!mysqli_query($db,$sql)){
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=products&sucess=0');
					exit();	
				}
				else{
					header('location:/admin/index.php?page=products&sucess=1');	
					exit();
				}
			}
	endif
?>