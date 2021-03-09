<div class="container mt35">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link active" data-toggle="tab" href="#menu1">Menu 1</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
		</li>
	</ul>
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
    			<strong>Danger!</strong>Please,contact to administrator.
  			</div>
		<?php endif ?>
	<?php endif ?>
	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane container active" id="menu1">
			<h1 class="text-center">Add sliders</h1>
			<form action="tables/slider-insert.php?slider=1&insert=1" enctype="multipart/form-data" method="post">
				<input type="text" hidden="" value='1' name='slider'>
				<div class="form-group">
					<label for="title">Title: </label>
					<input type="text" name="title" placeholder="Title" class="form-control">
				</div>
				<div class="form-group">
					<label for="img">Image: </label>
					<input type="file" required="" name="fileToUpload" id="fileToUpload" class="form-control-file border">
					<label class="text-danger" for="tip">1920x570 recommended</label>
				</div>
				<div class="form-group">
					<label for="description">Description: </label>
					<textarea type="text" name ="description" rows="5" class="form-control"></textarea>
				</div>
  				<br>
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>

			<button data-toggle="collapse" data-target="#slider_1" class="btn btn-primary mt10 pb10">
				Open slider 1
			</button>
		</div>
		<div class="tab-pane container fade" id="menu2">
			<h1 class="text-center">Add sliders</h1>
			<form action="tables/slider-insert.php?slider=1&insert=1" enctype="multipart/form-data" method="post">
				<input type="text" hidden="" value='2' name='slider'>
				<div class="form-group">
					<label for="title">Title: </label>
					<input type="text" name="title" placeholder="Title" class="form-control">
				</div>
				<div class="form-group">
					<label for="img">Image: </label>
					<input type="file" required="" name="fileToUpload" id="fileToUpload" class="form-control-file border">
				</div>
  				<br>
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>
			<button data-toggle="collapse" data-target="#slider_2" class="btn btn-primary mt10 pb10">Open slider 2</button>
		</div>
	</div>
</div>
<?php  
	$firstSlider = "SELECT * FROM slider";
	$result1 = mysqli_query($db,$firstSlider);
	if(!$result1){
		$error = mysqli_error($db);
		echo 'Error result1 :' . $error;
		exit();
	}
	$secondSlider = "SELECT * FROM slider_2nd";
	$result2 = mysqli_query($db,$secondSlider);
	if(!$result2){
		$error = mysqli_error($db);
		echo 'Error result2 :' . $error;
		exit();
	}
?>
<div class="container pb35" id="accordion">
	<!-- First Slider -->
		<div id="slider_1" class="collapse" data-parent="#accordion">
			<h1 class="text-center">First slider</h1>
			<table class="table-bordered table-striped w-100">
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Title</th>
					<th>Description</th>
					<th>Created At</th>
					<th>Created By</th>
					<th>Updated At</th>
					<th>Updated By</th>
					<th>Update</th>
					<th>DELETE</th>
				</tr>
				<?php while($recording=mysqli_fetch_assoc($result1)) :
					$id = htmlspecialchars($recording['id']);
					$img = htmlspecialchars($recording['image']);
					$title = htmlspecialchars($recording['title']);
					$description = htmlspecialchars($recording['description']);
					$created_at = htmlspecialchars($recording['created_at']);
					$created_by = htmlspecialchars($recording['created_by']);
					$updated_at = htmlspecialchars($recording['updated_at']);
					$updated_by = htmlspecialchars($recording['updated_by']);
				?>
				<tr>
					<th><?php echo $id;?></th>
					<th><img class="w-25" src="<?php echo $img; ?>" alt="image"></th>
					<th><?php echo $title;?></th>
					<th><?php echo $description;?></th>
					<th><?php echo $created_at;?></th>
					<th><?php echo $created_by;?></th>
					<th><?php echo $updated_at;?></th>
					<th><?php echo $updated_by;?></th>
					<th>
						<!-- <a href="/admin/index.php?page=update&slider=1&update=1&id=<?php echo $id; ?>"class="btn btn-primary text-uppercase">update</a> -->
						<form action="/admin/tables/update.php?update=1&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value="1" name="slider">
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
					</th>
					<th>
						<form action="/admin/tables/slider-insert.php?slider=1&delete=1&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
							<input type="text" hidden="" value='1' name='slider'>
							<button class="btn btn-danger" type="submit">DELETE</button>
						</form>
					</th>
				</tr>
				<?php endwhile ?>
			</table>
		</div>
	<!-- Second Slider -->
	<div id="slider_2" class="collapse" data-parent="#accordion">
		<h1 class="text-center">Second slider</h1>
		<table class="table-bordered table-striped w-100">
			<tr>
				<th>ID</th>
				<th>Image</th>
				<th>Title</th>
				<th>Created At</th>
				<th>Created By</th>
				<th>Updated At</th>
				<th>Updated By</th>
				<th>Update</th>
				<th>DELETE</th>
			</tr>
			<?php while($recording=mysqli_fetch_assoc($result2)) :
				$id = htmlspecialchars($recording['id']);
				$img = htmlspecialchars($recording['image']);
				$title = htmlspecialchars($recording['title']);
				$created_at = htmlspecialchars($recording['created_at']);
				$created_by = htmlspecialchars($recording['created_by']);
				$updated_at = htmlspecialchars($recording['updated_at']);
				$updated_by = htmlspecialchars($recording['updated_by']);
			?>
			<tr>
				<th><?php echo $id;?></th>
				<th><img class="w-25" src="<?php echo $img; ?>" alt="image"></th>
				<th><?php echo $title;?></th>
				<th><?php echo $created_at;?></th>
				<th><?php echo $created_by;?></th>
				<th><?php echo $updated_at;?></th>
				<th><?php echo $updated_by;?></th>
				<th>
					<!-- <a href="/admin/index.php?page=update&update=1&id=<?php echo $id; ?>" class="btn btn-primary text-uppercase">update</a> -->
					<form action="/admin/tables/update.php?update=1&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value="2" name="slider">
						<button class="btn btn-primary" type="submit">Update</button>
					</form>
				</th>
				<th>
					<form action="/admin/tables/slider-insert.php?slider=1&delete=1&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value='2' name='slider'>
						<button class="btn btn-danger" type="submit">DELETE</button>
					</form>
				</th>
			</tr>
			<?php endwhile ?>
		</table>
	</div>
</div>
