<?php include '../header.php'; ?>	
<?php
// $link = mysqli_connect('localhost','root','','restaurant');
$link = mysqli_connect('localhost','holduser','UYtiuTI&*yt8Yiu','azizbek_hint');
$user_id = $_SESSION['username'];
//Sliders part
	if(isset($_GET['slider'])) :
		//Insert
			if(isset($_GET['insert'])) {
				include 'uploadmanual.php';
				$title = $_POST['title'];
				$description = "";
				if(isset($_POST['description'])){
					$description = $_POST['description'];
				}
				$user_id = $_SESSION['username'];
				$sql= "";
				$which_slider = $_POST['slider'];
				if($which_slider == 1){
					$sql = "INSERT INTO slider (title, description, image,created_by,updated_by) 
					VALUES ('$title','$description','$target_file','$user_id','$user_id')";
				}
				elseif ($which_slider == 2) {
					$sql = "INSERT INTO slider_2nd (title,image,created_by,updated_by) 
					VALUES ('$title','$target_file','$user_id','$user_id')";
				}
				if (!mysqli_query($link, $sql)){
					// $error = "Error adding submitted data: " . mysqli_error($link);
					// echo $error;
					if($which_slider == 1){
						header('location:/admin/index.php?page=sliders&sucess=0');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=0');					
					}
					exit();
				}
				else{
					if($which_slider == 1){
						header('location:/admin/index.php?page=sliders&sucess=1');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=1');
					}

				}
			}
		// Update
			if(isset($_GET['update'])) {
				$which_slider = $_POST['slider'];
				$id= $_GET['id'];
				if($_FILES['fileToUpload']['size'] > 0){
					include 'uploadmanual.php';
				}else{
					$target_file = $_POST['imgold'];
				}
				$title = $_POST['title'];
				if(isset($_POST['description'])){
					$description = $_POST['description'];	
				}
				if(isset($_POST['status'])) {
					$status = $_POST['status'];	
				}

				$sql = "";
				if($which_slider == 1){
				$sql = "UPDATE slider SET title='$title',description='$description',updated_by='$user_id',image='$target_file'WHERE id=$id";
				}
				elseif($which_slider == 2){
					$sql = "UPDATE slider_2nd SET title = '$title', updated_by='$user_id', image='$target_file' WHERE id = $id ";
				}
				if(!mysqli_query($link,$sql)){
					// echo 'Error ' . mysqli_error($link);
					if($which_slider == 1){
						header('location:/admin/index.php?page=sliders&sucess=0');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=0');
					}
					exit();
				}
				else{
					if($which_slider == 1){
						header('location:/admin/index.php?page=sliders&sucess=1');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=1');
					}
				}
			}
		// Delete
			if(isset($_GET['delete'])){
				$which_slider = $_POST['slider'];
				$id= $_GET['id'];
				$sql="";
				if($which_slider == 1){
					$sql = "DELETE FROM slider WHERE id = $id;";
				}
				elseif($which_slider == 2){
					$sql = "DELETE FROM slider_2nd WHERE id=$id";
				}
				if(!mysqli_query($link,$sql)){
					// echo 'Error ' . mysqli_error($link);
					if ($which_slider == 1) {
						header('location:/admin/index.php?page=sliders&sucess=0');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=0');
					}
					exit;
				}
				else{
					if($which_slider == 1){
						header('location:/admin/index.php?page=sliders&sucess=1');
					}
					else{
						header('location:/admin/index.php?page=sliders&sucess=1');
					}
				}
			}
	endif;

// About part
	if(isset($_GET['about'])) :
		// Insert
			if(isset($_GET['insert']) ){
			include 'uploadabout.php';
			
			$title = $_POST['title'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$imgcount = count($_FILES['upload']['name']);
			$img = [];
			for($i = 0; $i < $imgcount; $i++){
				array_push($img,"/admin/uploads/" . $_FILES['upload']['name'][$i]);
			}
			$sql = "INSERT INTO about (title,description,content,created_by,image_1,image_2,image_3,image_4)
			VALUES ('$title','$description','$content','$user_id','$img[0]','$img[1]','$img[2]','$img[3]')";
			if(!mysqli_query($link,$sql)){
				// echo 'Error: ' . mysqli_error($link);
				header('location:/admin/index.php?page=about&sucess=0');
				exit();
			}
			else{
				header('location:/admin/index.php?page=about&sucess=1');
	 		}
			}
		// Update
			if(isset($_GET['delete'])){
			$id = $_POST['id'];
			$sql = "DELETE FROM about WHERE id = $id";
			if (!mysqli_query($link,$sql)) {
				// echo 'Error: ' . mysqli_error($link);
				header('location:/admin/index.php?page=about&sucess=0');
				exit();
			}
			else{
				header('location:/admin/index.php?page=about&sucess=1');
				exit();
			}
			}
		// Delete
			if(isset($_GET['update'])) {
			$id = $_POST['id'];
			$title = $_POST['title'];
			$description = $_POST['description'];
			$content = $_POST['content'];
			$sql = '';	
			if($_FILES['upload']['size'][0] > 0){
				include 'uploadabout.php';
				// echo '<br>';
				// var_dump($_FILES['upload']['size'][0]);
				
				$img1 = "/admin/uploads/" . $_FILES['upload']['name'][0];
				$img2 = "/admin/uploads/" . $_FILES['upload']['name'][1];
				$img3 = "/admin/uploads/" . $_FILES['upload']['name'][2];
				$img4 = "/admin/uploads/" . $_FILES['upload']['name'][3];
				
				$sql = "UPDATE about SET title = '$title',description='$description',content = '$content',image_1 = '$img1',image_2 = '$img2',image_3 = '$img3',image_4 = '$img4' WHERE id = $id ";
			}
			else{
				$sql = "UPDATE about SET title = '$title',description='$description',content = '$content' WHERE id = $id";
			}
			if(!mysqli_query($link,$sql)) {
				// echo 'Error: ' . mysqli_error($link);
				header('location:/admin/index.php?page=about&sucess=0');
				exit();
			}
			else{
				header('location:/admin/index.php?page=about&sucess=1');
				exit();
			}
			}
	endif
?>

