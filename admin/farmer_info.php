<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午2:00
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
$info['title'] = '农户信息总览';
?>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';

?>

<div id="main">
    <div class="title">农户信息总览</div>
    <table class="list" style="margin-top: 15px;padding-left: 7px;">
        <tr>
          <th>ID</th>
          <th>姓名</th>
          <th>性别</th>
          <th>电话</th>
          <th>地址</th>
          <th>描述</th>
        </tr>
    <?php
    include '../logic/connect.php';
    $query ="select * from farmer_info where checked=true;";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_row($result)) {
$html = <<<A
        <tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>
                <a href='../logic/Delete.php?user_id=$row[0]' onclick="return confirm('确定删除该用户?');">[删除]</a>
            </td>
        </tr>
A;
        echo $html;
    }
    ?>
    </table>

    <div class="title">待审核农户信息</div>
    <table class="list" style="margin-top: 15px;padding-left: 7px;">
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>性别</th>
            <th>电话</th>
            <th>地址</th>
            <th>描述</th>
        </tr>
        <?php
        include '../logic/connect.php';
        $query ="SELECT * FROM farmer_info WHERE checked= FALSE;";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_row($result)){
            ?>
            <tr>
                <td><?php echo $row[0]?></td>
                <td><?php echo $row[1]?></td>
                <td><?php echo $row[2]?></td>
                <td><?php echo $row[3]?></td>
                <td><?php echo $row[4]?></td>
                <td><?php echo $row[5]?></td>
                <td>
                    <a href='../logic/Check.php?user_id=<?php echo $row[0]?>'onclick="return confirm('确认通过审核?');">[通过]</a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';