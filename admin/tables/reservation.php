<div class="container mt35 pb35">
	<?php if (isset($_GET['sucess'])) : ?>
		<?php if($_GET['sucess'] == 1) : ?>
		<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong>
        </div>
    	<?php endif ?>
    	<?php if($_GET['sucess'] == 0) : ?>
    		<div class="alert alert-danger alert-dismissible">
    			<button type="button" class="close" data-dismiss="alert">&times;</button>
    			<strong>Fail!</strong>Contact to administrator
  			</div>
    	<?php endif ?>
    <?php endif ?>
	<form action="/admin/reservation-insert.php?insert=1&image=1" method="post" class="mt35 pb35" enctype="multipart/form-data">
		<div class="custom-file">
			<input type="file" name="fileToUpload" id="fileToUpload" class="form-control">
			<label class="custom-file-label" for="fileToUpload">Image: </label>
		</div>
		<button class="btn btn-primary" type="Submit">Submit</button>
	</form>
	<table class="table-striped w-100">
		<tr>
			<th>ID</th>
			<th>Image</th>
			<th class="text-danger">Delete</th>
		</tr>
		<tr>
			<?php  
			$sql = "SELECT * FROM reservation_image";
			$result = mysqli_query($db,$sql);
			if(!$result){
				echo 'Error: ' . mysql_error($db);
				exit();
			}
			?>
			<?php while($recording = mysqli_fetch_assoc($result)) : 
				$id = $recording['id'];
				$img = $recording['image'];
			?>
			<tr>
				<th><?php echo $id; ?></th>
				<th><img src="<?php echo $img; ?>" style="width: 80px;height: 45px;" alt="image"></th>
				<th>
					<form action="/admin/reservation-insert.php?delete=1&image=1" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value="<?php echo $id; ?>" name="id">
						<button class="btn btn-danger text-uppercase">Delete</button>
					</form>
				</th>
			</tr>
		<?php endwhile ?>
		</tr>
	</table>
	<table class="table-striped w-100 mt35">
		<tr>
			<th>ID</th>
			<th>Time</th>
			<th>Date</th>
			<th>Phone</th>
			<th>Name</th>
			<th>Guests count</th>
			<th>Email</th>
			<th>Created_at</th>
			<th>user-browser</th>
			<th>User-ip</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php  
			$sql = "SELECT * FROM reservation";
			$result = mysqli_query($db,$sql);
			if(!$result){
				echo 'Error: ' . mysql_error($db);
				exit();
			}
			?>
			<?php while($recording = mysqli_fetch_assoc($result)) : 
				$id = $recording['id'];
				$time = $recording['time_s'];
				$date = $recording['date_s'];
				$phone = $recording['phone'];
				$name = $recording['fullname'];
				$guests_count = $recording['guests_count'];
				$email = $recording['email'];
				$created_at = $recording['created_at'];
				$user_browser = $recording['user_browser'];
				$user_ip = $recording['user_ip'];
			?>
			<tr>
				<th><?php echo $id ; ?></th>
				<th><?php echo $time ; ?></th>
				<th><?php echo $date ; ?></th>
				<th><?php echo $phone ; ?></th>
				<th><?php echo $name ; ?></th>
				<th><?php echo $guests_count ; ?></th>
				<th><?php echo $email  ?></th>
				<th><?php echo $created_at ; ?></th>
				<th><?php echo $user_browser ; ?></th>
				<th><?php echo $user_ip ; ?></th>
				<th>
					<form action="/admin/tables/reservation-update.php" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value="<?php echo $id; ?>" name="id">
						<button class="btn btn-primary">Edit</button>
					</form>
				</th>
				<th>
					<form action="/admin/reservation-insert.php?delete=1" method="post" enctype="multipart/form-data">
						<input type="text" hidden="" value="<?php echo $id; ?>" name="id">
						<button class="btn btn-danger text-uppercase">Delete</button>
					</form>
				</th>
			</tr>
			<?php endwhile ?>
	</table>
</div>