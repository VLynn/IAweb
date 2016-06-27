<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午2:57
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
$info['title'] = '温湿度设置总览';
?>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';

?>

<div id="main">
    <div class="title">温湿度设置总览</div>
    <table class="list" style="margin-top: 15px;padding-left: 7px;">
        <tr>
            <th>传感器编号</th>
            <th>作物名称</th>
            <th>温度设置</th>
            <th>湿度设置</th>
        </tr>
        <?php
            include '../logic/connect.php';
            $query ="select sensor_list.sensor_id, plant_name, temperature_set, humidity_set
                    from sensor_list, sensor_setting where sensor_list.sensor_id=sensor_setting.sensor_id";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_row($result)){
                ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                </tr>
        <?php }?>
    </table>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';