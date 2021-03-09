<?php  
	include '../header.php';
?>
<?php
	$id='';
	if(isset($_GET['id'])){
		$id = $_GET['id'];	
	}
	else{
		echo '<br> <div class="jumbotron"> <h1 class="text-center">Cannot get </h1></div> id <br>';
		exit();
	}
	if(isset($_GET['update'])) : 
		$which_slider = $_POST['slider'];
		if($which_slider == 1) :
			$tableinfo = "SELECT * FROM slider WHERE id=$id";	
			$result = mysqli_query($db,$tableinfo);
			if(!$result){
				echo 'Error' . mysqli_error($db);
			}
			while($recording=mysqli_fetch_assoc($result)){
				$title = htmlspecialchars($recording['title']);
				$description = htmlspecialchars($recording['description']);
				$img = htmlspecialchars($recording['image']);
				$created_at = htmlspecialchars($recording['created_at']);
				$created_by = htmlspecialchars($recording['created_by']);
				$updated_by = $_SESSION['username'];
			}
?>
	<div class="container mt35 pb35">
		<form action="slider-insert.php?slider=1&update=1&id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">
			<input type="text" hidden="" value="<?php echo $id; ?>">
			<input type="text" hidden="" value='1' name='slider'>
        	<input type="text" hidden="" name='imgold' value="<?php echo $img?>">
			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label for="img">Image: </label>
				<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file border">
				<label class= "text-danger"for="tip">1920x570 recommended</label>
			</div>
			<div class="form-group">
				<label for="description">Description: </label>
				<textarea type="text" name ="description" rows="5" class="form-control"><?php echo $description; ?></textarea>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
	</form>
	</div>
	<?php endif ?>
	<?php  
		if($which_slider == 2) :
			$tableinfo = "SELECT * FROM slider_2nd WHERE id=$id";	
			$result = mysqli_query($db,$tableinfo);
			if(!$result){
				echo 'Error' . mysqli_error($db);
			}
			while($recording=mysqli_fetch_assoc($result)){
				$title = htmlspecialchars($recording['title']);
				$img = htmlspecialchars($recording['image']);
				$created_at = htmlspecialchars($recording['created_at']);
				$created_by = htmlspecialchars($recording['created_by']);
				$updated_by = $_SESSION['username'];
			}
		
	?>
	<div class="container mt35 pb35">
		<form action="slider-insert.php?slider=1&update=1&id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">
			<input type="text" hidden="" value="<?php echo $id; ?>">
			<input type="text" hidden="" value='2' name='slider'>
        	<input type="text" hidden="" name='imgold' value="<?php echo $img?>">
			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label for="img">Image: </label>
				<input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file border">
				<label class= "text-danger"for="tip">1920x570 recommended</label>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
	</form>
	</div>
		<?php endif ?>
	<?php endif ?>