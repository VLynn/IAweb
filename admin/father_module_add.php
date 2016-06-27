<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/27
 * Time: 上午10:43
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
include 'inc/tool.inc.php';
$info['title'] = '添加父版块';
?>

<?php
//对表单做非空判断和非法字符判断
if(isset($_POST['submit'])) {
    if(empty($_POST['module_name'])) {
        echo "<script>alert('版块名称不得为空!')</script>";
        header("refresh:0;url='father_module_add.php'");
    }
    else if(mb_strlen($_POST['module_name'])>36) {
        echo "<script>alert('版块名不得超过36个字符!')</script>";
        header("refresh:0;url='father_module_add.php'");
    }
    else if(!is_numeric($_POST['sort'])) {
        echo "<script>alert('排序不得为空或非数字字符!')</script>";
        header("refresh:0;url='father_module_add.php'");
    }

    //检查数据库中是否已有此版块
    $link = connect();
    $query_exist = "select * from father_module where module_name = '{$_POST['module_name']}'";
    $result = query($link, $query_exist);
    if(mysqli_num_rows($result)) {
        skip('father_module_add.php', 'error', '已有此版块, 请重试!');
    }
    //插入数据到数据库
    $query = "insert into father_module(module_name, sort) values('{$_POST['module_name']}', {$_POST['sort']})";
    query($link, $query);
    if(mysqli_affected_rows($link) == 1) {
        skip('father_module.php', 'ok', '添加成功!');
    }
    else {
        skip('father_module_add.php', 'error', '添加失败, 请重试!');
    }
}

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div id="main">
    <div class="title">添加父版块</div>
    <form method="post">
        <table style="margin-top: 15px;padding-left: 7px;" class="au">
            <tr>
                <td>版块名称</td>
                <td><input name="module_name" type="text" /></td>
                <td>
                    版块名称不得为空, 最多不得超过36个字符
                </td>
            </tr>
            <tr>
                <td>排序</td>
                <td><input name="sort" type="text" /></td>
                <td>
                    请输入数字作为排序号码
                </td>
            </tr>
        </table>
        <input style="margin-top: 20px;cursor: pointer"  class="btn" type="submit" name="submit" value="添加" />
    </form>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
