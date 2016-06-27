<?php
session_save_path("/tmp");
session_start();
include '../logic/connect.php';
include '../logic/url.php';

/*if(!isset($_POST['log'])){
	exit('please log from the home page!');
}*/


$username = htmlspecialchars($_POST['username']);
$password = ($_POST['password']);


$result = mysqli_query($conn, "select * from farmer_login where username = '" . $username . "'
		 and password='" . $password . "';");
if($result = mysqli_fetch_array($result)){
    $_SESSION['username'] = $username;
    header("refresh:0;url=" . $ShowInfoUrl);
}
else {
    echo "<script>alert('please check your username and password')</script>";
    header("refresh:0;url=" . $LoginUrl);
}
?>
<html>
<head>
</head>
<body>
	<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/tinynav.min.js"></script>
	<script type="text/javascript" src="../js/jquery.sticky.js"></script>
	<script type="text/javascript" src="../js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="../js/jquery.animate.js"></script>
	<script type="text/javascript" src="../js/jquery.anchorScroll.js"></script>
	<script type='text/javascript' src='../js/jquery.easing.1.3.js'></script>
	<script type="text/javascript" src="../js/jquery.quicksand.js"></script>
	<script type="text/javascript" src="../js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="../js/ajax-actions.js"></script>
	<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>



