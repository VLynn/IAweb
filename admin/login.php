<?php 
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once 'inc/tool.inc.php';

$link=connect();

if(isset($_POST['submit'])){
	if(empty($_POST['name'])){
		skip('login.php','error','管理员名称不得为空！');
	}
	if(mb_strlen($_POST['name'])>36){
		skip('login.php','error','管理员名称不得多余36个字符！');
	}
//	if(mb_strlen($_POST['pw'])<6){
//		skip('login.php','error','密码不得少于6位！');
//	}
//	if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
//		skip('login.php', 'error','验证码输入错误！');
//	}
	//	$_POST=escape($link,$_POST);
	$query="select * from manage where name='{$_POST['name']}' and pw='{$_POST['pw']}'";
	$result=query($link, $query);
	if(mysqli_num_rows($result)==1){
		$data=mysqli_fetch_assoc($result);
        setcookie('manage_name', $_POST['name'], time()+3600);
        setcookie('manage_pw', $_POST['pw'], time()+3600);
		skip('father_module.php','ok','登录成功！');
	}else{
		skip('login.php','error','用户名或者密码错误，请重试！');
	}
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title>后台登录</title>
<meta name="keywords" content="后台登录" />
<meta name="description" content="后台登录" />
<style type="text/css">
body {
	background:#f7f7f7;
	font-size:14px;
}
#main {
	width:360px;
	height:320px;
	background:#fff;
	border:1px solid #ddd;
	position:absolute;
	top:50%;
	left:50%;
	margin-left:-180px;
	margin-top:-160px;
}
#main .title {
	height: 48px;
	line-height: 48px;
	color:#333;
	font-size:16px;
	font-weight:bold;
	text-indent:30px;
	border-bottom:1px dashed #eee;
}
#main form {
	width:300px;
	margin:20px 0 0 40px;
}
#main form label {
	margin:10px 0 0 0;
	display:block;
}
#main form label input.text {
	width:200px;
	height:25px;
}
#main form label .vcode {
	display:block;
	margin:0 0 0 56px;
}
#main form label input.submit {
	width:200px;
	display:block;
	height:100px;
	cursor:pointer;
	margin:20px 0 0 56px;
}
</style>
</head>
<body>
	<div id="main">
		<div class="title">管理登录</div>
		<form method="post">
			<label>用户名：<input class="text" type="text" name="name" /></label>
			<label>密　码：<input class="text" type="password" name="pw" /></label>
			<label>验证码：<input class="text" type="text" name="vcode" /></label>
			<label><img class="vcode" src="../show_code.php" /></label>
			<label><input class="submit" type="submit" name="submit" value="登录" /></label>
		</form>
	</div>
</body>
</html>