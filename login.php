<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午10:26
 */
include_once 'inc/config.inc.php';
include_once  'inc/mysql.inc.php';
include 'admin/inc/tool.inc.php';
$info['title'] = "登录页";
$info['css'] = array("style/public.css", "style/register.css");

if(isset($_POST['submit'])) {
//    var_dump($_COOKIE['vcode']);
//    var_dump($_POST['vcode']);exit();
    //对登录表单做非空检查
    if(empty($_POST['name'])) {
        echo "<script>alert('用户名不得为空!')</script>";
        header("refresh:0;url='login.php'");
    }
    else if(mb_strlen($_POST['name'])>36) {
        echo "<script>alert('用户名不得超过36个字符!')</script>";
        header("refresh:0;url='login.php'");
    }
    else if(empty($_POST['pw'])) {
        echo "<script>alert('密码不得为空!')</script>";
        header("refresh:0;url='login.php'");
    }
    //目前尚有bug,$_SESSION['vcode']为null
//    if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])) {
//        echo "<script>alert('验证码输入错误!')</script>";
//        header("refresh:0;url='login.php'");
//    }
    $link = connect();
    $query = "select * from member where username = '{$_POST['name']}' and password = md5('{$_POST['pw']}')";
    $result = query($link, $query);
    if(mysqli_num_rows($result) == 1) {
        setcookie('name', $_POST['name'], time()+3600);
        setcookie('pw', sha1(md5($_POST['pw'])), time()+3600);
        skip('index.php', 'ok', '登陆成功!');
    }
    else {
        skip('login.php', 'error', '用户名或密码填写错误!');
    }
}

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div style="margin-top:55px;"></div>
<div id="register" class="auto">
    <h2 style="padding-left: 160px">请登录</h2>
    <form method="post">
        <label>用户名：<input name="name" type="text"  /><span></span></label>
        <label>密码：<input name="pw" type="password"  /><span></span></label>
        <label>验证码：<input name="vcode" type="text"  /><span>*请输入下方验证码</span></label>
        <img class="vcode" src="show_code.php" />
        <div style="clear:both;"></div>
        <input class="btn" style="margin-top: 30px" type="submit" name="submit" value="登录" />
    </form>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>
