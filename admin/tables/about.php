<style>
	.imageabout{
		width: 160px;
		height: 90px;
	}

</style>
<div class="container mt35 pb35">
	<!-- Success/Fail reports -->
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
		<form action="tables/slider-insert.php?about=1&insert=1" method="post" enctype="multipart/form-data">
			<form action="tables/slider-insert.php?" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<label for="title">Title: </label>
					<input type="text" required="" name="title" maxlength="25" placeholder="Title" class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Description: </label>
					<textarea type="text" required="" maxlength="255" name ="description" rows="2" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="description">Content: </label>
					<textarea type="text" required="" name ="content" rows="5" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="fileToUpload_1">Image 1</label>
					<input type="file" required="" name="upload[]" id="fileToUpload_1" class="form-control-file border w-25">
					<label for="fileToUpload_2">Image 2</label>
					<input type="file" required="" name="upload[]" id="fileToUpload_2" class="form-control-file border w-25">
					<label for="fileToUpload_3">Image 3</label>
					<input type="file" required="" name="upload[]" id="fileToUpload_3" class="form-control-file border w-25">
					<label for="fileToUpload_4">Image 4</label>
					<input type="file" required="" name="upload[]" id="fileToUpload_4" class="form-control-file border w-25">
					<label class="text-danger" for="tip">270x150 recommended</label>
				</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
</div>
<?php  
	$about = "SELECT * FROM about";
	$result = mysqli_query($db,$about);
	if(!$result){
		$error = mysqli_error($db);
		echo 'Error :' . $error;
		exit();
	}
?>
<!-- List -->
	<div class="container pb35" id="accordion">
		<button class="btn btn-primary" data-toggle="collapse" data-target="#about">
			Records
		</button>
		<div id="about" class="collapse" data-parent="#accordion">
			<table class="table-bordered table-striped w-100">
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Description</th>
					<th>Content</th>
					<th>Created At</th>
					<th>Created By</th>
					<th>Image 1</th>
					<th>Image 2</th>
					<th>Image 3</th>
					<th>Image 4</th>								
					<th>Update</th>
					<th>DELETE</th>
				</tr>
					<?php while($recording=mysqli_fetch_assoc($result)) :
						$id = htmlspecialchars($recording['id']);
						$title = htmlspecialchars($recording['title']);
						$description = htmlspecialchars($recording['description']);
						$content = htmlspecialchars($recording['content']);
						$created_at = htmlspecialchars($recording['created_at']);
						$created_by = htmlspecialchars($recording['created_by']);
						$img1 = htmlspecialchars($recording['image_1']);
						$img2 = htmlspecialchars($recording['image_2']);
						$img3 = htmlspecialchars($recording['image_3']);
						$img4 = htmlspecialchars($recording['image_4']);			
					?>
				<tr>
					<th><?php echo $id;?></th>
					<th><?php echo $title;?></th>
					<th><?php echo mb_substr($description,0,50).'...';?></th>
					<th><?php echo mb_substr($content,0,50). '...'; ?></th>
					<th><?php echo $created_at;?></th>
					<th><?php echo $created_by;?></th>
					<th><img class="imageabout" src="<?php echo $img1; ?>" alt="image"></th>
					<th><img class="imageabout" src="<?php echo $img2; ?>" alt="image"></th>
					<th><img class="imageabout" src="<?php echo $img3; ?>" alt="image"></th>
					<th><img class="imageabout" src="<?php echo $img4; ?>" alt="image"></th>
					<th>
						<a href="/admin/index.php?page=aboutupdate&update=1&id=<?php echo $id;?>" class="btn btn-primary text-uppercase">update</a>
					</th>
					<th>
        				<form action="/admin/tables/slider-insert.php?about=1&delete=1" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value='1' name='delete'>
						<input type="text" hidden="" value='<?php echo $id; ?>' name='id'>
						<button class="btn btn-danger" type="submit">DELETE</button>
						</form>
					</th>
				</tr>
				<?php endwhile ?>
			</table>
		</div>
	</div>