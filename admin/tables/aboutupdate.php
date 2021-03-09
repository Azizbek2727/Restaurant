<div class="container">
	<!-- Php part -->
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
			$tableinfo = "SELECT * FROM about WHERE id=$id";
			$result = mysqli_query($db,$tableinfo);
			if(!$result){
				echo 'Error' . mysqli_error($db);
			}
		while($recording=mysqli_fetch_assoc($result)){
			$title = htmlspecialchars($recording['title']);
			$description = htmlspecialchars($recording['description']);
			$content = htmlspecialchars($recording['content']);
			$img1 = htmlspecialchars($recording['image_1']);
			$img2 = htmlspecialchars($recording['image_2']);
			$img3 = htmlspecialchars($recording['image_3']);
			$img4 = htmlspecialchars($recording['image_4']);
		}
?>
<!-- Form -->
	<div class="container mt35 pb35">
		<form action="tables/slider-insert.php?about=1&update=1" enctype="multipart/form-data" method="post">
			<input type="text" hidden="" name="id" value="<?php echo $id; ?>">
        	<input type="text" hidden="" name='oldimgs' multiple="multiple" value="<?php echo $img1; echo $img2; echo $img3; echo$img4;?>">
			<div class="form-group">
				<label for="title">Title: </label>
				<input type="text" name="title" placeholder="Title" maxlength="25" value="<?php echo $title; ?>" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Description: </label>
				<textarea type="text" name ="description" rows="2" maxlength="255" class="form-control"><?php echo $description; ?></textarea>
			</div>
			<div class="form-group">
				<label for="description">Content: </label>
				<textarea type="text" name ="content" rows="5" class="form-control"><?php echo $content; ?></textarea>
			</div>
			<div class="form-group">
				<label for="img">Image: </label>
				<label for="fileToUpload_1">Image 1</label>
				<input type="file" name="upload[]" id="fileToUpload_1" class="form-control-file border w-25">
				<label for="fileToUpload_2">Image 2</label>
				<input type="file" name="upload[]" id="fileToUpload_2" class="form-control-file border w-25">
				<label for="fileToUpload_3">Image 3</label>
				<input type="file" name="upload[]" id="fileToUpload_3" class="form-control-file border w-25">
				<label for="fileToUpload_4">Image 4</label>
				<input type="file" name="upload[]" id="fileToUpload_4" class="form-control-file border w-25">
				<label class="text-danger" for="tip">270x150 recommended</label>
				<label class= "text-danger"for="tip">1920x570 recommended</label>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
	</form>
	</div>
<?php endif ?>
</div>
