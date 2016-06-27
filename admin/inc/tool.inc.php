<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/27
 * Time: 上午9:38
 */

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
