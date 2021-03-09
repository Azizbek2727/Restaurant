<?php	
	// $link = mysqli_connect('localhost','root','');
	$link = mysqli_connect('localhost','holduser','UYtiuTI&*yt8Yiu','azizbek_hint');
	if(!$link){ //if link is wrong
		$output='Unable to connect to the database';
		echo $output;
		exit();
	}
	if(!mysqli_set_charset($link,'utf8')){ 
		$output='Unable to set database connectiing encoding';
		echo $output;
		exit();
	}
	if(!mysqli_select_db($link,'restaurant')){
		$output='Unable to locate the database';
		echo $output;
		exit();
	}
?>