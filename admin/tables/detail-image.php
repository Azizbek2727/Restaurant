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
	<form action="tables/detail-image-insert.php?image=1&insert=1" method="post" enctype="multipart/form-data">
		<div class="custom-file">
			<label for="fileToUpload" class="custom-file-label">Image</label>
			<input type="file" required="" name="fileToUpload" id="fileToUpload" class="custom-file-input border w-25">
		</div>
		<button class="btn btn-primary mt15" type="submit">Submit</button>
	</form>

	<table class="table-striped w-100">
		<tr>
			<th>id</th>
			<th>image</th>
			<th>delete</th>
		</tr>
		<?php 
			$sql = "SELECT * FROM detail_image";
			$result = mysqli_query($db,$sql);
			while($recording = mysqli_fetch_assoc($result)) :
				$id = $recording['id'];
				$image = $recording['image'];
		?>
		<tr>
			<th><?php echo $id; ?></th>
			<th><?php echo $image; ?></th>
			<th>
				<form action="tables/detail-image-insert.php?image=1&delete=1" method="post" enctype="multipart/form-data">
					<input type="text" hidden="" value="<?php echo $id; ?>" name = "id">
					<button type="submit" class="btn btn-danger text-uppercase">delete</button>
				</form>
			</th>
		</tr>
	<?php endwhile ?>
	</table>
</div>