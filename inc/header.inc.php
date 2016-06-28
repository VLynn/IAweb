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
<link rel="stylesheet" type="text/css" href="style/public.css" />
<link rel="stylesheet" type="text/css" href="style/register.css" />
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">IA智慧农业</div>
			<div class="nav">
				<a class="hover">首页</a>
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
				<a>您好! [{$_COOKIE['name']}]</a>
A;
					echo $str;
				}
				else {
$str = <<<A
				<a>登录</a>&nbsp;
				<a>注册</a>
A;
				echo $str;
				}
				?>
			</div>
		</div>
	</div>