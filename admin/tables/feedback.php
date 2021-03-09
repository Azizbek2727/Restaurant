<div class="container mt35 pb35">
	<!-- Sucess/Fail report -->
		<?php if(isset($_GET['sucess'])) : ?>
		<?php if($_GET['sucess'] == 1) : ?>
			<div class="alert alert-success alert-dismissible mt20 pb10">
    	           <button type="button" class="close" data-dismiss="alert">&times;</button>
    	           <strong>Success!</strong>
    	       </div>
		<?php endif ?>
		<?php if($_GET['sucess'] == 0) : ?>
			<div class="alert alert-danger alert-dismissible mt20 pb10">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			<strong>Fail!</strong>Please,contact to administrator.
  			</div>
		<?php endif ?>
		<?php endif ?>
	<!-- Form -->
		<form action="tables/feedback-insert.php?insert=1" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<!-- Author name -->
			<input required="" type="text" name='name' class="form-control" placeholder="Author name: ">
		</div>

		<div class="form-group">
			<!-- Feedback content -->
			<input required="" type="text" name='content' placeholder="Feedback: " class="form-control">
		</div>

		<div class="custom-file">
			<!-- Image -->
			<label class="custom-file-label" for="fileToUpload">Image: </label>
			<input required="" type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input">
		</div>

		<div class="form-group mt15">
			<!-- Rating -->
			<label for="rating">Rate: </label>
			<input type="number" id='quantity' required="" name='rating' placeholder="Beetween 1 and 5" class="form-control" min="1" max="5">
		</div>

		<div class="custom-control custom-switch">
			<!-- Visibility -->
    		<input type="checkbox" name="status" class="custom-control-input" id="switch1">
    		<label class="custom-control-label" for="switch1">Visible</label>
  		</div>
		<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	<!-- List -->
		<table class="w-100 table-striped">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Content</th>
			<th>Image</th>
			<th>Star_count</th>
			<th>Created_at</th>
			<th>Created_by</th>
			<th>Updated_at</th>
			<th>Updated_by</th>
			<th>Status</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<?php  
			$sql = "SELECT * FROM feedback";
			$result = mysqli_query($db,$sql);
			if(!$result){
				echo 'Error' . mysql_error($db);
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
			?>
			<tr>
				<th><?php echo $id; ?></th>
				<th><?php echo $name; ?></th>
				<th><?php echo mb_substr($content,0,40); ?></th>
				<th><?php echo $image; ?></th>
				<th><?php echo $rating; ?></th>
				<th><?php echo $created_at; ?></th>
				<th><?php echo $created_by; ?></th>
				<th><?php echo $updated_at; ?></th>
				<th><?php echo $updated_by; ?></th>
				<th><?php echo $status; ?></th>
				<th>
					<form action="tables/feedback-update.php?feedback=1" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" name="id" value='<?php echo $id ?>'>
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
				</th>
				<th>
					<form action="tables/feedback-insert.php?feedback=1&delete=1" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" name="id" value="<?php echo $id; ?>">
						<button class="btn btn-danger text-uppercase" type="submit">Delete</button>
					</form>
				</th>
			</tr>
		<?php endwhile ?>
		</table>
</div>