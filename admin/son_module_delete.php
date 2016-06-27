<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午12:59
 */
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once 'inc/tool.inc.php';

$url_return = 'son_module.php';

// 对id是否传递以及id的格式做判断,防止出现类似id=100 or 1=1这种严重错误
if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    skip($url_return, 'error', 'id参数错误!');
    exit();
}
$link = connect();
$query = "delete from son_module where id = {$_GET['id']}";
$result = query($link, $query);

if(mysqli_affected_rows($link) == 1) {
    skip($url_return, 'ok', '恭喜你,删除成功!');
}
else {
    skip($url_return, 'error', '抱歉,删除失败,请重试!');
}