<ul class="nav nav-tabs">
  	<li class="nav-item">
    	<a class="nav-link active" data-toggle="tab" href="#products">Home</a>
  	</li>
  	<li class="nav-item">
    	<a class="nav-link" data-toggle="tab" href="#categories">Categories</a>
  	</li>
  	<li class="nav-item">
  		<a href="#types" data-toggle="tab" class="nav-link">Types</a>
  	</li>
</ul>
<div class="container"> 
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
</div>
<div class="container mt35 pb35">
	<div class="tab-content">
		<div id="categories" class="tab-pane container fade">
			<table class="w-100 table-striped">
			<tr>
				<th>
					Category Name
				</th>
				<th>
					Add
				</th>
			</tr>
			<tr>
				<th>
			<form action="tables/product-insert.php?categories=1" class="mt20 pb20" method="post" enctype="multipart/form-data">
				<div class="form-group d-inline-block w-75">
					<input type="text" required="" name="category_name" class="form-control">
				</div>	
				</th>
				<th>
				<button class="btn btn-primary" type="submit">Submit</button>
			</form>
				</th>	
			</tr>
			</table>
			<table class="table-striped w-100">
			<tr>
				<th>
					ID
				</th>
				<th>
					Name
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
			<?php 
				$sql = "SELECT * FROM product_categories";
				if(!mysqli_query($db,$sql)){
					echo 'Error: ' . mysqli_error($db);
				}
				$result = mysqli_query($db,$sql);
				while($recording = mysqli_fetch_assoc($result)) :
				$id = $recording['id'];
				$name = $recording['name'];
			?>
			<tr>
				<th>
					<?php echo $id; ?>
				</th>
				<th>
					<?php echo $name; ?>
				</th>
				<th>
					<form action="tables/product-insert.php?categories=1&update=1" method="post" enctype="multipart/form-data">
						<div class="form-group d-inline-block w-75">
							<input type="text" hidden="" name="id" value="<?php echo $id; ?>" class="form-control">
							<input type="text" value="<?php echo $name; ?>" name="newname" class="form-control">
						</div>
						<button class="btn btn-primary">Set</button>
					</form>
				</th>
				<th>
					<form action="tables/product-insert.php?categories=1&delete=1" method="post" enctype="multipart/form-data">
						<div class="form-group d-none">
							<input type="text" hidden="" value="<?php echo $id; ?>" name="id" class="form-control">
						</div>
						<button class="btn btn-danger align-top">DELETE</button>
					</form>
				</th>
			</tr>
			<?php endwhile ?>
			</table>
		</div>
		<div id="types" class="tab-pane container fade">
			<table class="w-100 table-striped">
			<tr>
				<th>
					Category Name
				</th>
				<th>
					Add
				</th>
			</tr>
			<tr>
				<th>
					<form action="tables/product-insert.php?types=1" class="mt20 pb20" method="post" enctype="multipart/form-data">
						<div class="form-group d-inline-block w-75">
							<input type="text" required="" name="type_name" class="form-control">
						</div>	
				</th>
				<th>
						<button class="btn btn-primary" type="submit">Submit</button>
					</form>
				</th>	
			</tr>
			</table>
			<table class="table-border table-striped w-100">
			<tr>
				<th>
					ID
				</th>
				<th>
					Name
				</th>
				<th>
					Edit
				</th>
				<th>
					Delete
				</th>
			</tr>
			<?php 
				$sql = "SELECT * FROM product_types";
				if(!mysqli_query($db,$sql)){
					echo 'Error: ' . mysqli_error($db);
				}
				$result = mysqli_query($db,$sql);
				while($recording = mysqli_fetch_assoc($result)) :
				$id = $recording['id'];
				$name = $recording['name'];
			?>
			<tr>
				<th>
					<?php echo $id; ?>
				</th>
				<th>
					<?php echo $name; ?>
				</th>
				<th>
					<form action="tables/product-insert.php?types=1&update=1" method="post" enctype="multipart/form-data">
						<div class="form-group d-inline-block w-75">
							<input type="text" hidden="" name="id" value="<?php echo $id; ?>" class="form-control">
							<input type="text" value="<?php echo $name; ?>" name="newname" class="form-control">
						</div>
						<button class="btn btn-primary">Set</button>
					</form>
				</th>
				<th>
					<form action="tables/product-insert.php?types=1&delete=1" method="post" enctype="multipart/form-data">
						<div class="form-group d-none">
							<input type="text" hidden="" name="id" value="<?php echo $id; ?>" class="form-control">
						</div>
						<button class="btn btn-danger align-top">DELETE</button>
					</form>
				</th>
			</tr>
			<?php endwhile ?>
			</table>
		</div>
		<div id="products" class="tab-pane container active">
			<?php  
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
			?>
			<form action="tables/product-insert.php?products=1&insert=1" method="post" enctype="multipart/form-data" class="w-100">
			<div class="form-group">
				<label for="name">Name: </label>
				<input required="" type="text" name="product_name" class="form-control">
			</div>
			<div class="form-group">
				<label for="description">Description: </label>
				<textarea required="" name="description" rows="3" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="number" name="price" required="" class="form-control">
			</div>
			<div class="form-group">
				<label for="category">Category: </label>
				<select name="category" required="" class="custom-select">
					<?php  
						foreach ($categorieslist as $key => $value) {
							echo "<option value='$key'>$value</option>";
						}
					?>
  				</select>
			</div>
			<div class="form-group">
				<label for="type">Type: </label>
				<select name="type" class="custom-select" required="">
					<?php  
						foreach ($typeslist as $key => $value) {
							echo "<option value='$key'>$value</option>";
						}
					?>
  				</select>
			</div>
			<div class="custom-file">
				<input type="file" required="" name="fileToUpload" id="fileToUpload" class="form-control">
				<label class="custom-file-label" for="fileToUpload">Image: </label>
			</div>
			<div class="custom-control custom-switch mt15 pb15">
    			<input type="checkbox" class="custom-control-input" name="status" id="switch1">
    			<label class="custom-control-label" for="switch1">Status: </label>
  			</div>
  			<button class="btn btn-primary" type="submit">Submit</button>
			</form>
			<table class="table-striped w-100">
				<tr>
					<th>
						ID
					</th>
					<th>
						Name
					</th>
					<th>
						Description
					</th>
					<th>
						Price
					</th>
					<th>
						Category_id
					</th>
					<th>
						Type_id
					</th>
					<th>
						Img
					</th>
					<th>
						Created_at
					</th>
					<th>
						Created_by
					</th>
					<th>
						Updated_at
					</th>
					<th>
						Updated_by
					</th>
					<th>
						Status
					</th>
					<th>
						Update
					</th>
					<th class='text-danger'>
						DELETE
					</th>
				</tr>
				<?php  
					$sql = "SELECT * FROM foods ORDER BY id DESC";
					if(!mysqli_query($db,$sql)){
						echo 'Error: ' . mysqli_error($db);
						exit();
					}
					$result = mysqli_query($db,$sql);
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
					?>
					<tr>
						<th>
							<?php echo $id; ?>
						</th>
						<th>
							<?php echo $name; ?>
						</th>
						<th>
							<?php echo mb_substr($description,0,20).'...'; ?>
						</th>
						<th>
							<?php echo $price.'$'; ?>
						</th>
						<th>
							<?php echo $categorieslist[$category_id]; ?>
						</th>
						<th>
							<?php echo $typeslist[$type_id]; ?>
						</th>
						<th>
							<img src="<?php echo $img; ?>" class="" alt="">
						</th>
						<th>
							<?php echo $created_at; ?>
						</th>
						<th>
							<?php echo $created_by; ?>
						</th>
						<th>
							<?php echo $updated_at; ?>
						</th>
						<th>
							<?php echo $updated_by; ?>
						</th>
						<th>
							<?php echo $status; ?>
						</th>
						<th>
							<form action="tables/feedback-update.php?products=1&update=1" method="post" enctype="multipart/form-data">
								<input type="text" hidden="" name="id" value='<?php echo $id ?>'>
								<button class="btn btn-primary" type="submit">Update</button>
							</form>
						</th>
						<th>
							<form action="tables/product-insert.php?products=1&delete=1" method="post" enctype="multipart/form-data">
								<input type="text" hidden="" name="id" value='<?php echo $id ?>'>
								<button class="btn btn-danger text-uppercase" type="submit">Delete</button>
							</form>
						</th>
					</tr>
					<?php endwhile ?>
			</table>
		</div>
	</div>	
</div>