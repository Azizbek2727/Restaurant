<?php include '../header.php'; ?>
<?php  
	if(isset($_GET['products'])) :
		$id = $_POST['id'];
		$sql = "SELECT * FROM foods WHERE id = $id";
		$result = mysqli_query($db,$sql);
		if(!$result){
			echo 'Error' . mysqli_error($db);
			exit();
		}
		//Gey all categories
		$sql1 = "SELECT * FROM product_categories";
		if(!mysqli_query($db,$sql1)) {
			echo 'Error: ' . mysqli_error($db);
		}
		$result1 = mysqli_query($db,$sql1);
		$categorieslist = [];
		while($recording=mysqli_fetch_assoc($result1)) {
			$name = htmlspecialchars($recording['name']);
			array_push($categorieslist,$name);
		}
		//Get all types
		$sql2 = "SELECT * FROM product_types";
		if(!mysqli_query($db,$sql2)) {
			echo 'Error: ' . mysqli_error($db);
		}
		$result2 = mysqli_query($db,$sql2);
		$typeslist = [];
		while($recording=mysqli_fetch_assoc($result2)) {
			$name = htmlspecialchars($recording['name']);
			array_push($typeslist,$name);
		}

		//Get updating products values
		while($recording = mysqli_fetch_assoc($result)) :
			$id = htmlspecialchars($recording['id']);
			$name = htmlspecialchars($recording['name']);
			$description = htmlspecialchars($recording['description']);
			$price = htmlspecialchars($recording['cost']);
			$category_id = htmlspecialchars($recording['category_id']);
			$type_id = htmlspecialchars($recording['type_id']);
			$img = htmlspecialchars($recording['img']);
			$created_at = htmlspecialchars($recording['created_at']);
			$created_by = htmlspecialchars($recording['created_by']);
			$updated_at = htmlspecialchars($recording['updated_at']);
			$updated_by = htmlspecialchars($recording['updated_by']);
			$status = htmlspecialchars($recording['status']);
		endwhile
		?>
		<!-- Form to update -->
		<div class="container mt35 pb35">
			
			<form action="product-insert.php?products=1&update=1" method="post" enctype="multipart/form-data" class="w-100">
				<input type="text" hidden="" name="id" value="<?php echo $id; ?>">
				<div class="form-group">
					<label for="name">Name: </label>
					<input type="text" name="product_name" value="<?php echo $name; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Description: </label>
					<textarea name="description" rows="3" class="form-control"><?php echo $description; ?></textarea>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="number" name="price" value="<?php echo $price ?>" required="" class="form-control">
				</div>
				<div class="form-group">
					<label for="category">Category: </label>
					<select name="category" class="custom-select" value="<?php echo $categorieslist[$category_id]; ?>">
						<?php  
							foreach ($categorieslist as $key => $value) {
								echo "<option value='$key'>$value</option>";
							}
						?>
	  				</select>
				</div>
				<div class="form-group">
					<label for="type">Type: </label>
					<select name="type" class="custom-select" value="<?php echo $typeslist[$type_id]; ?>;">
						<?php  
							foreach ($typeslist as $key => $value) {
								echo "<option value='$key'>$value</option>";
							}
						?>
	  				</select>
				</div>
				<div class="custom-file">
					<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
					<input type="text" hidden="" value="<?php echo $img; ?>" name="oldimage">
					<label class="custom-file-label" for="fileToUpload">Image: </label>
				</div>
				<div class="custom-control custom-switch mt15 pb15">
	    			<input type="checkbox" class="custom-control-input" name="status" id="switch1">
	    			<label class="custom-control-label" for="switch1">Status: </label>
	  			</div>
	  			<button class="btn btn-primary" type="submit">Submit</button>
			</form>
		</div>
		<?php
	endif;
	?>
	<?php 
	if(isset($_GET['feedback'])) : 
		$id = $_POST['id'];
		$sql = "SELECT * FROM feedback WHERE id=$id";
		$result = mysqli_query($db,$sql);
		if(!$result){
			echo 'Error: ' . mysqli_error($db);
			exit();
		}
		while($recording = mysqli_fetch_assoc($result)) :
			$id = htmlspecialchars($recording['id']);
			$name = htmlspecialchars($recording['name']);
			$content = htmlspecialchars($recording['content']);
			$image = htmlspecialchars($recording['image']);
			$rating = htmlspecialchars($recording['star_count']);
			$created_at = htmlspecialchars($recording['created_at']);
			$created_by = htmlspecialchars($recording['created_by']);
			$updated_at = htmlspecialchars($recording['updated_at']);
			$updated_by = htmlspecialchars($recording['updated_by']);
			$status = htmlspecialchars($recording['status']);
		endwhile;
	?>
	<div class="container mt-35 pb-35">
		<form action="feedback-insert.php?update=1" method="post" enctype="multipart/form-data">
			<input type="text" hidden="" value="<?php echo $id; ?>" name="id">
			<div class="form-group">
				<!-- Author name -->
				<input type="text" name='name' value='<?php echo $name; ?>' class="form-control" placeholder="Author name: ">
			</div>

			<div class="form-group">
				<!-- Feedback content -->
				<input type="text" name='content' value="<?php echo $content; ?>" placeholder="Feedback: " class="form-control">
			</div>

			<div class="custom-file">
				<!-- Image -->
				<label class="custom-file-label" for="fileToUpload">Image: </label>
				<input type="file" name="fileToUpload" id="fileToUpload"  class="custom-file-input">
				<input type="text" hidden="" value="<?php echo $image; ?>" name='oldimage'>
			</div>

			<div class="form-group mt15">
				<!-- Rating -->
				<label for="rating">Rate: </label>
				<input type="number" id='quantity' required="" value="<?php echo $rating; ?>" name='rating' placeholder="Beetween 1 and 5" class="form-control" min="1" max="5">
			</div>

			<div class="custom-control custom-switch">
				<!-- Visibility -->
	    		<input type="checkbox" name="status" class="custom-control-input" id="switch1">
	    		<label class="custom-control-label" for="switch1">Visible</label>
	  		</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	</div>
	<?php endif ?>