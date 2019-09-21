<?php
	if(isset($_SESSION['user_id']) && isset($_SESSION['category'])){
		$user_id = $_SESSION['user_id'];
		$category = $_SESSION['category'];
			if($category == 1){
				echo '<h2>Welcome '.$user_id.'</h2>';
			}else{
				include '../includes/logout.inc.php';
			}
	}else{
		include '../includes/logout.inc.php';
	}
?>