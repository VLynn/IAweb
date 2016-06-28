<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/27
 * Time: 上午9:38
 */

//页面跳转函数
function skip($url, $pic, $message) {
$html = <<<A
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="refresh" content="2;URL=$url" />
        <title>正在跳转</title>
        <meta name="keywords" content="正在跳转" />
        <meta name="description" content="正在跳转" />
        <link rel="stylesheet" type="text/css" href="style/remind.css" />
    </head>
    <body>
    <div class="notice"><span class="pic $pic"></span> {$message} 2s后直接跳转!</div>
    </body>
    </html>
A;
echo $html;
exit();
}

//检查是否登录函数
function is_login($link){
    if(isset($_COOKIE['name']) && isset($_COOKIE['pw'])){
        $query="select * from member where username='{$_COOKIE['name']}'";
        $result=query($link,$query);
        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            return $data['id'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>
