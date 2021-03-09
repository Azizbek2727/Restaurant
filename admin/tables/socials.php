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
		<form action="tables/socials-insert.php?insert=1" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="soc-name">Social: </label>
			<select class="form-control" required="" name="soc-name" id="soc-icon">
				<option value="Telegram">Telegram</option>
				<option value="Vk">Vkontakte</option>
				<option value="Facebook">Facebook</option>
				<option value="Twitter">Twitter</option>
				<option value="Google+">Google+</option>
			</select>
		</div>
		<div class="form-group">
			<label for="soc-link">Social Link: </label>
			<input type="text" name="soc-link" required="" id="soc-link" class="form-control">
		</div>
		<div class="form-group">
			<label for="soc-icon">Social Icon: </label>
			<select class="form-control" required="" name="soc-icon" id="soc-icon">
				<option value="fa-telegram">Telegram</option>
				<option value="fa-vk">Vkontakte</option>
				<option value="fa-facebook">Facebook</option>
				<option value="fa-twitter">Twitter</option>
				<option value="fa-google-plus">Google+</option>
			</select>
		</div>
		<button class="btn btn-primary" type="Submit">Submit</button>
		</form>
</div>
	<!-- List -->
		<div class="container mt35 pb35">
			<table class="table-striped w-100">
				<tr>
					<th>ID</th>
					<th>Social</th>
					<th>Social link</th>
					<th>Social icon</th>
					<th>Created_at</th>
					<th>created_by</th>
					<th>updated_at</th>
					<th>updated_by</th>
					<th>Edit</th>
					<th class="text-danger">Delete</th>
				</tr>
				<?php  
					$sql = "SELECT * FROM socials";
					$result = mysqli_query($db,$sql);
					if(!$result){
						echo 'Error: ' . mysqli_error($db);
						exit();
					}
					while($recording = mysqli_fetch_assoc($result)) :
						$id = $recording['id'];
						$social = $recording['social'];
						$social_link = $recording['social_link'];
						$social_icon = $recording['social_icon'];
						$created_at = $recording['created_at'];
						$created_by = $recording['created_by'];
						$updated_at = $recording['updated_at'];
						$updated_by = $recording['updated_by'];
				?>
				<tr>
					<th>
						<?php echo $id ;?>
							
						</th>
					<th>
						<?php echo $social ;?>
						<form action="tables/socials-insert.php?update=1" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" hidden="" value="<?php echo $id; ?>" name="id">
								<select class="form-control" name="soc-name" id="soc-icon">
									<option value="Telegram">Telegram</option>
									<option value="Vk">Vkontakte</option>
									<option value="Facebook">Facebook</option>
									<option value="Twitter">Twitter</option>
									<option value="Google+">Google+</option>
								</select>
							</div>
					</th>
					<th>
						<?php echo $social_link ;?>
						<div class="form-group">
							<input type="text" name="soc-link" value="<?php echo $social_link; ?>" id="soc-link" class="form-control">
						</div>
					</th>
					<th class="text-center">
						<i class="fa <?php echo $social_icon ;?>" aria-hidden="true"></i>
						
						<div class="form-group">
							<select class="form-control" name="soc-icon" id="soc-icon">
								<option value="fa-telegram">Telegram</option>
								<option value="fa-vk">Vkontakte</option>
								<option value="fa-facebook">Facebook</option>
								<option value="fa-twitter">Twitter</option>
								<option value="fa-google-plus">Google+</option>
							</select>
						</div>
					</th>
					<th class="align-top">
						<?php echo $created_at . '<br>' ;?>
					</th>
					<th class="align-top">
						<?php echo $created_by . '<br>' ;?>
					</th>
					<th class="align-top">
						<?php echo $updated_at . '<br>' ;?>
					</th>
					<th class="align-top">
						<?php echo $updated_by . '<br>' ;?>	
					</th>
					<th>
						 	<button class="btn btn-primary" type="Submit">Edit</button>
						</form>
					</th>
					<th>
						<form action="tables/socials-insert.php?delete=1" method="post" enctype="multipart/form-data">
							<input type="text" hidden="" value="<?php echo $id; ?>" name = "id">
							<button class="btn btn-danger text-uppercase">delete</button>
						</form>
					</th>
				</tr>
			<?php endwhile ?>
			</table>
		</div>