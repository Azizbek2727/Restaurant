<?php include 'header.php'; ?>
<?php
// Insert
	if(isset($_GET['insert'])) :
		// Reservation Image part
			if(isset($_GET['image'])) :
				include 'upload.php';
				$img = $target_file;
				$sql = "INSERT INTO reservation_image (image) VALUES ('$img')";
				if(!mysqli_query($db,$sql)) {
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=reservation&sucess=0');
					exit();
				}
				else{
					header('location:/admin/index.php?page=reservation&sucess_uploaded');
					exit();
				}
			endif;
		// Reservation part 
			if(!isset($_GET['image'])) :
				$name = $_POST['name'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				$email = $_POST['email'];
				$guests = $_POST['guests'];
				$tel_num = $_POST['tel-num'];
				function getUserIpAddr(){
	    			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        		//ip from share internet
	        			$ip = $_SERVER['HTTP_CLIENT_IP'];
	    			}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        			//ip pass from proxy
	        			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	 	   			}else{
	        			$ip = $_SERVER['REMOTE_ADDR'];
	    			}
	    			return $ip;
				}
				$user_ip = getUserIpAddr();
				$created_at = date("Y-m-d");
				$browser = $_SERVER['HTTP_USER_AGENT'];
				$sql = "INSERT INTO reservation (time_s,date_s,phone,fullname,guests_count,email,created_at,user_browser,user_ip)
				VALUES('$time','$date','$tel_num','$name','$guests','$email','$created_at','$browser','$user_ip')";
				if(!mysqli_query($db,$sql)) {
					// echo 'Error: ' . mysqli_error($db);
					header('location:../index.php?page=home&fail_reserved#reservation');
					exit();
				}
				else{
					header('location:../index.php?page=home&success_reserved#reservation'); 
					exit();
				}
			endif;
	endif;
// Update Reservation 
	if(isset($_GET['update'])) :
		$id = $_POST['id'];
		$name = $_POST['name'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$email = $_POST['email'];
		$guests = $_POST['guests'];
		$tel_num = $_POST['tel-num'];
		function getUserIpAddr(){
    		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        	//ip from share internet
        		$ip = $_SERVER['HTTP_CLIENT_IP'];
    		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        		//ip pass from proxy
        		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 	   		}else{
        		$ip = $_SERVER['REMOTE_ADDR'];
    		}
    		return $ip;
		}
		$user_ip = getUserIpAddr();
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$sql = "UPDATE reservation 
		SET fullname = '$name',date_s = '$date',time_s = '$time', email = '$email',guests_count = $guests,phone = '$tel_num',user_browser = '$browser',user_ip = '$user_ip' WHERE id = $id";
		if(!mysqli_query($db,$sql)) {
			// echo 'Error: ' . mysqli_error($db);
			header('location:/admin/index.php?page=reservation&sucess=0');
			exit();
		}
		else{
			header('location:/admin/index.php?page=reservation&sucess=1');
			exit();
		}
	endif;
//Delete 
	if(isset($_GET['delete'])) :
		// Reservation block image
			if(isset($_GET['image'])) :
				$id = $_POST['id'];
				$sql = "DELETE FROM reservation_image WHERE id = $id";
				if(!mysqli_query($db,$sql)) {
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=reservation&sucess=0');
					exit();
				}
				else{
					header('location:/admin/index.php?page=reservation&sucess=1');

				}
			endif; 
		// Reservation
			if(!isset($_GET['image'])) : 
				$id = $_POST['id'];
				$sql = "DELETE FROM reservation WHERE id = $id";
				if(!mysqli_query($db,$sql)) {
					// echo 'Error: ' . mysqli_error($db);
					header('location:/admin/index.php?page=reservation&sucess=0');

					exit();
				}
				else{
					header('location:/admin/index.php?page=reservation&sucess=1');
					exit();
				}
			endif;
	endif
?>