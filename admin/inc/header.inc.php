<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <title><?php echo $info['title']?></title>
    <meta name="keywords" content="智慧农业后台" />
    <meta name="description" content="智慧农业后台" />
    <link rel="stylesheet" type="text/css" href="style/admin_public.css" />
</head>
<body>
<div id="top">
    <div class="logo">
        管理中心
    </div>
    <ul class="nav">
        <li><a href="http://www.lynnfly.cn/IAweb/page/index.php" target="_blank">智慧农业</a></li>
    </ul>
    <div class="login_info">
        <a href="#" style="color:#fff;">网站首页</a>&nbsp;|&nbsp;
        管理员： admin <a href="#">[注销]</a>
    </div>
</div>
<div id="sidebar">
    <ul>
        <li><!--  class="current" -->
            <div class="small_title">论坛管理</div>
            <ul class="child">
<!--            basename($_SERVER['SCRIPT_NAME'])判断当前文件名,突出当前页面类别(蓝色/圆点)-->
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'father_module.php'){echo "class='current'";} ?> href="father_module.php">父版块列表</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'father_module_add.php'){echo "class='current'";} ?> href="father_module_add.php">添加父版块</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'son_module.php'){echo "class='current'";} ?> href="son_module.php">子版块列表</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'son_module_add.php'){echo "class='current'";} ?> href="son_module_add.php">添加子版块</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == ''){echo "class='current'";} ?> href="#">帖子管理</a></li>
            </ul>
        </li>
        <li>
            <div class="small_title">系统管理</div>
            <ul class="child">
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'farmer_info.php'){echo "class='current'";} ?> href="farmer_info.php">农户信息</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'greenhouse_info.php'){echo "class='current'";} ?> href="greenhouse_info.php">大棚信息</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'sensor_info.php'){echo "class='current'";} ?> href="sensor_info.php">温湿度信息</a></li>
                <li><a <?php if(basename($_SERVER['SCRIPT_NAME']) == 'controll_info.php'){echo "class='current'";} ?> href="controll_info.php">温湿度控制</a></li>
            </ul>
        </li>
        <li>
            <div class="small_title">用户管理</div>
            <ul class="child">
                <li><a href="#">用户列表</a></li>
            </ul>
        </li>
    </ul>
</div>