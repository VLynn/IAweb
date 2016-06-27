<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午12:29
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
$info['title'] = '子板块列表';
?>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

    <div id="main" >
        <div class="title">子版块列表</div>
        <table class="list" style="margin-top: 15px;padding-left: 7px;">
            <tr>
                <th>排序</th>
                <th>版块名称</th>
                <th>所属父版块</th>
                <th>操作</th>
            </tr>
            <?php
            $link = connect();
            $query = "select father_module.module_name as 'father_module_name', son_module.module_name as 'module_name',
                      son_module.sort as 'sort', son_module.id from father_module, son_module where father_module.id = son_module.father_module_id";
            $result = query($link, $query);
            while($data = mysqli_fetch_assoc($result)) {
                //对url地趾做编码处理
                $url_return = urlencode($_SERVER['REQUEST_URI']);
                $url_delete = urlencode("son_module_delete.php?id={$data['id']}");
                $message = urlencode("确定要删除子版块 {$data['module_name']} 吗?");
                $url_confirm = "confirm.php?url=$url_delete&return_url=$url_return&message=$message";
                $html = <<<A
                <tr>
                    <td><input class="sort" type="text" name="sort" value="{$data['sort']}" /></td>
                    <td>{$data['module_name']}</td>
                    <td>{$data['father_module_name']}</td>
                    <td><a href="#">[编辑]</a>&nbsp;&nbsp;<a href="$url_confirm">[删除]</a></td>
                </tr>
A;
                echo $html;
            }
            ?>

        </table>
    </div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';