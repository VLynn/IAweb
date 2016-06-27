<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/26
 * Time: 下午10:34
 */
include_once '../inc/config.inc.php';

if(!isset($_GET['url']) || !isset($_GET['return_url']) || !isset($_GET['message'])) {
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <title>确认页</title>
    <meta name="keywords" content="确认页" />
    <meta name="description" content="确认页" />
    <link rel="stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class="notice"><span class="pic ask"></span> <?php echo $_GET['message'] ?> <a
        style="color: red;" href="<?php echo $_GET['url']?>">确定</a> | <a
        style="color: #666;" href="<?php echo $_GET['return_url']?>">取消</a></div>
</body>
</html>