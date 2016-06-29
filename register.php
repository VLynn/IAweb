<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'admin/inc/tool.inc.php';
$info['title']='注册页';
$info['css']=array('style/public.css','style/register.css');

$link=connect();
$member_id=is_login($link);
if($member_id){
	skip('index.php','error','你已经登录，请不要重复注册！');
}
if(isset($_POST['submit'])){
	if(empty($_POST['name'])){
		skip('register.php', 'error', '用户名不得为空！');
	}
	if(mb_strlen($_POST['name'])>36){
		skip('register.php', 'error', '用户名长度不要超过36个字符！');
	}
	if(mb_strlen($_POST['pw'])<6){
		skip('register.php', 'error','密码不得少于6位！');
	}
	if($_POST['pw']!=$_POST['confirm_pw']){
		skip('register.php', 'error','两次密码输入不一致！');
	}
//	if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
//		skip('register.php', 'error','验证码输入错误！');
//	}
//	$_POST=escape($link,$_POST);
	$query="select * from member where username='{$_POST['name']}'";
	$result=query($link, $query);
	if(mysqli_num_rows($result)){
		skip('register.php', 'error', '这个用户名已经被别人注册了！');
	}
	$query="insert into member(username,password) values('{$_POST['name']}',md5('{$_POST['pw']}'))";
	query($link,$query);
	if(mysqli_affected_rows($link)==1){
		setcookie('name',$_POST['name']);
		setcookie('pw',sha1(md5($_POST['pw'])));
		skip('index.php','ok','注册成功！');
	}else{
		skip('register.php','eror','注册失败,请重试！');
	}
}
?>
<?php include 'inc/header.inc.php'?>
    <div style="margin-top:55px;"></div>
	<div id="register" class="auto">
		<h2>欢迎注册成为 智慧农业论坛成员</h2>
		<form method="post">
			<label>用户名：<input type="text" name="name"  /><span>*用户名不得为空，并且长度不得超过36个字符</span></label>
			<label>密码：<input type="password" name="pw"  /><span>*密码不得少于6位</span></label>
			<label>确认密码：<input type="password" name="confirm_pw"  /><span>*请输入与上面一致</span></label>
			<label>验证码：<input name="vcode" name="vocode" type="text"  /><span>*请输入下方验证码</span></label>
			<img class="vcode" src="show_code.php" />
			<div style="clear:both;"></div>
			<input class="btn" name="submit" type="submit" value="确定注册" />
		</form>
	</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>
