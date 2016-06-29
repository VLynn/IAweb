<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 下午10:36
 */
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/page.inc.php';
include 'admin/inc/tool.inc.php';
$info['title'] = "子版块帖子列表";
$info['css'] = array("style/public.css", "style/list.css");

$link = connect();
$member_id = is_login($link);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('index.php', 'error', '子版块id参数不合法!');
}
//从数据库获取子版块数据
$query = "select * from son_module where id={$_GET['id']}";
$result_son = query($link, $query);
if(mysqli_num_rows($result_son)!=1){
    skip('index.php', 'error', '子版块不存在!');
}
//从数据库获取父版块数据
$data_son = mysqli_fetch_assoc($result_son);
$query =  "select * from father_module where id={$data_son['father_module_id']}";
$result_father = query($link,$query);
$data_father = mysqli_fetch_assoc($result_father);
//从数据库获取总计帖子数量和今日帖子数量
$query = "select count(*) from posts where son_module_id={$_GET['id']}";
$count_all = num($link,$query);
$query = "select count(*) from posts where son_module_id={$_GET['id']} and date>CURDATE()";
$count_today = num($link,$query);

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <a href="index.php">首页</a> &gt; <a><?php echo $data_father['module_name']?></a> &gt; <?php echo $data_son['module_name']?>
</div>
<div id="main" class="auto">
    <div id="left">
        <div class="box_wrap">
            <h3><?php echo $data_son['module_name']?></h3>
            <div class="num">
                今日：<span><?php echo $count_today?></span>&nbsp;&nbsp;&nbsp;
                总帖：<span><?php echo $count_all?></span>
            </div>
            <div class="notice"><?php echo $data_son['info']?></div>
            <div class="pages_wrap">
                <a class="btn publish" href="publish.php?son_module_id=<?php echo $_GET['id']?>" target="_blank"></a>
                <div class="pages">
                    <?php
                    $page=page($count_all,12);
                    echo $page['html'];
                    ?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <ul class="postsList">
            <?php
            $query="select
			posts.title,posts.id,posts.date,posts.times,member.username,member.photo
			from posts,member where
			posts.son_module_id={$_GET['id']} and
			posts.member_id=member.id
			{$page['limit']}";
            $result_content=query($link,$query);
            while($data_content=mysqli_fetch_assoc($result_content)){
                $query = "select count(*) from reply where post_id={$data_content['id']}";
                $count_reply = num($link, $query);
                ?>
                <li>
                    <div class="smallPic">
                        <a href="#">
                            <img width="45" height="45"src="<?php if($data_content['photo']!=''){echo $data_content['photo'];}else{echo 'style/photo.jpg';}?>">
                        </a>
                    </div>
                    <div class="subject">
                        <div class="titleWrap"><h2><a href="show.php?id=<?php echo $data_content['id']?>" target="_blank"><?php echo $data_content['title']?></a></h2></div>
                        <p>
                            楼主：<?php echo $data_content['name']?>&nbsp;<?php echo $data_content['date']?>&nbsp;&nbsp;&nbsp;&nbsp;最后回复：2014-12-08
                        </p>
                    </div>
                    <div class="count">
                        <p>
                            回复<br /><span><?php echo $count_reply?></span>
                        </p>
                        <p>
                            浏览<br /><span><?php echo $data_content['times']?></span>
                        </p>
                    </div>
                    <div style="clear:both;"></div>
                </li>
            <?php }?>
        </ul>
        <div class="pages_wrap">
            <a class="btn publish" href="publish.php?son_module_id=<?php echo $_GET['id']?>" target="_blank"></a>
            <div class="pages">
                <?php
                echo $page['html'];
                ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div id="right">
        <div class="classList">
            <div class="title">版块列表</div>
            <ul class="listWrap">
                <?php
                $query="select * from father_module";
                $result_father=query($link, $query);
                while($data_father=mysqli_fetch_assoc($result_father)){
                    ?>
                    <li>
                        <h2><a><?php echo $data_father['module_name']?></a></h2>
                        <ul>
                            <?php
                            $query="select * from son_module where father_module_id={$data_father['id']}";
                            $result_son=query($link, $query);
                            while($data_son=mysqli_fetch_assoc($result_son)){
                                ?>
                                <li><h3><a href="list_son.php?id=<?php echo $data_son['id']?>"><?php echo $data_son['module_name']?></a></h3></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>
