<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 上午2:55
 */
include_once '../inc/config.inc.php';
include_once  '../inc/mysql.inc.php';
$info['title'] = '温湿度总览';
?>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';

?>

    <div id="main">
        <div class="title">温湿度总览</div>
        <table class="list" style="margin-top: 15px;padding-left: 7px;">
            <tr>
                <th>大棚编号</th>
                <th>传感器编号</th>
                <th>作物名称</th>
                <th>温度</th>
                <th>湿度</th>
                <th>开始时间</th>
            </tr>
            <?php
            include '../logic/connect.php';
            $query ="select greenhouse_id, sensor_list.sensor_id, plant_name, temperature, humidity, start_time
                        from sensor_list, sensor_info where sensor_list.sensor_id=sensor_info.sensor_id";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_row($result)){
                ?>
                <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[5] ?></td>
                </tr>
            <?php }?>
        </table>
    </div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';