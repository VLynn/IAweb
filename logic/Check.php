<?php
	include 'connect.php';
    include 'url.php';
	$user_id = $_GET['user_id'];

	
	$query ="UPDATE farmer_info SET checked = 1 WHERE id = $user_id";
	if($result = mysqli_query($conn, $query)){
		header("refresh:0;url=$ShowInfoUrl");
	}
	else
		echo "<script>alert('failed!')</script>";
		header("refresh:0;url=$ShowInfoUrl");
?>	
