<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午2:51
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
$info['title'] = '绿色大棚总览';
?>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';

?>

<div id="main">
    <div class="title">绿色大棚总览</div>
    <table class="list" style="margin-top: 15px;padding-left: 7px;">
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>拥有者</th>
            <th>简介</th>
        </tr>
        <?php
        include '../logic/connect.php';
        $query ="SELECT * FROM greenhouse_list;";
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_row($result)){
        ?>
        <tr>
            <td><?php echo $row[1] ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[0] ?></td>
            <td><?php echo $row[3] ?></td>
        </tr>
        <?php }?>
    </table>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';