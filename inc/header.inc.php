<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<link rel="icon" href="http://v3.bootcss.com/favicon.ico">
<title><?php echo $info['title'] ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php
foreach ($info['css'] as $val) {
	echo "<link rel='stylesheet' type='text/css' href='$val' />";
}
?>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">智慧农业</div>
			<div class="nav">
				<a class="hover" href="index.php">首页</a>
			</div>
			<div class="serarch">
				<form>
					<input class="keyword" type="text" name="keyword" placeholder="搜索..." />
					<input class="submit" type="submit" name="submit" value="" />
				</form>
			</div>
			<div class="login">
				<?php
				if($member_id) {
$str = <<<A
                <a>您好！{$_COOKIE['name']}</a>
                <span style="color:#fff;">|</span> <a href="logout.php">退出</a>
A;
					echo $str;
				}
				else {
$str = <<<A
				<a href="login.php">登录</a>&nbsp;
				<a href="register.php">注册</a>
A;
				echo $str;
				}
				?>
			</div>
		</div>
	</div>