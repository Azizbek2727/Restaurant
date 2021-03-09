<div class="container mt50 pb50">
	<!-- Success/Fail report -->
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
	<ul class="nav nav-tabs">
  		<li class="nav-item">
    		<a class="nav-link active" data-toggle="tab" href="#users">Users</a>
  		</li>
  		<li class="nav-item">
    		<a class="nav-link" data-toggle="tab" href="#perms">Permissions</a>
  		</li>
	</ul>
	<div class="tab-content">
		<div id="users" class="tab-pane container active">
			<table class="table-striped w-100">
				<tr>
					<th>Username</th>
					<th>Email</th>
					<th>Password(encrypted)</th>
					<th>Permissions</th>
					<th>Set Permission</th>
					<th>Confirm</th>
					<th>Delete</th>
				</tr>
				<?php  
					$permlist = [];
					$sql = "SELECT perm_name FROM perms_list";
					$result = mysqli_query($db,$sql);
					while ($recording = mysqli_fetch_assoc($result)) {
						$perms = $recording['perm_name'];
						array_push($permlist,$perms);
					}
					$sql = "SELECT * FROM users";
					$result = mysqli_query($db,$sql);
					while($recording = mysqli_fetch_assoc($result)) :
						$username = $recording['username'];
						$email = $recording['email'];
						$password = $recording['password'];
						$perms = $recording['Permissions'];
					?>
					<tr>
						<th><?php echo $username ;?></th>
						<th><?php echo $email ;?></th>
						<th><?php echo $password ;?></th>
						<th><?php echo $perms ;?></th>
						<th>
							<form action="tables/users-handling.php?users=1&update=1" method="post" enctype="multipart/form-data">
								<input type="text" hidden="" value="<?php echo $username; ?>" name="username">
								<div class="form-group mb0">
									<select name="permission" class="form-control">
										<?php foreach ($permlist as $value) : ?>
											<option value="<?php echo $value ?>"><?php echo $value; ?></option>
										<?php endforeach ?>
									</select>
								</div>
						</th>
						<th>
							 	<button class="btn btn-primary" type="submit">Set</button>
							</form>
						</th>
						<th>
							<form action="tables/users-handling.php?users=1&delete=1" method="post" enctype="multipart/form-data">
								<input type="text" hidden="" value="<?php echo $username; ?>" name="username">
								<button class="btn btn-danger text-uppercase">Delete</button>
							</form>
						</th>
					</tr>
				<?php endwhile ?>
			</table>
		</div> 
		<div id="perms" class="tab-pane container fade">
			<table class="table-striped w-100 mt35 pb35">
				<tr>
					<th>Name</th>
					<th>Add</th>
				</tr>
				<tr>
					<th>
						<form action="tables/users-handling?perms=1&insert=1" method="post" enctype="multipart/form-data">
							<div class="form-group mb0 d-inline-block">
								<input type="text" name="name" class="form-control">
							</div>
					</th>
					<th>
							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</th>
				</tr>
			</table>
			
				
			<table class="table-striped w-100 mt50">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Edit</th>
					<th>Confirm</th>
					<th>Delete</th>
				</tr>
				<?php  
				$sql = "SELECT * FROM perms_list";
				$result = mysqli_query($db,$sql);
				while ($recording = mysqli_fetch_assoc($result)) :
				$id = $recording['perm_id'];
				$name = $recording['perm_name'];
				?>
				<tr>
					<th><?php echo $id ;?></th>
					<th><?php echo $name ;?></th>
					<th>
						<form action="tables/users-handling?perms=1&update=1" method="post" enctype="multipart/form-data">
							<div class="form-group mb0">
								<input type="text" class="form-control" value="<?php echo $id;?>" name="id" hidden="">
								<input type="text" class="form-control" value="<?php echo $name;?>" name="newname">
							</div>
					</th>
					<th>
							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</th>
					<th>
						<form action="tables/users-handling?perms=1&delete=1" method="post" enctype="multipart/form-data">
							<input type="text" value="<?php echo $id;?>" name="id" hidden="">
							<button class="btn btn-danger text-uppercase" type="submit">delete</button>
						</form>
					</th>
				</tr>
			<?php endwhile ?>
			</table>
		</div>
	</div>
</div>