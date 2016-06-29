<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/29
 * Time: 上午12:58
 */
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/page.inc.php';
include 'admin/inc/tool.inc.php';
$info['title'] = "帖子详细页面";
$info['css'] = array("style/public.css", "style/show.css");

$link = connect();
$member_id = is_login($link);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('index.php', 'error', '帖子id参数不合法!');
}
//每刷新一次界面,点击量+1
$query = "update posts set times=times+1";
query($link, $query);
//获取详细帖子及发帖人数据
$query="select p.id,p.son_module_id,p.title,p.content,p.date,p.member_id,p.times,m.username,m.photo from posts p,member m where p.id={$_GET['id']} and p.member_id=m.id";
$result_content=query($link,$query);
if(mysqli_num_rows($result_content)!=1){
    skip('index.php', 'error', '本帖子不存在!');
}
$data_content=mysqli_fetch_assoc($result_content);
$data_content['title']=htmlspecialchars($data_content['title']);
$data_content['content']=nl2br(htmlspecialchars($data_content['content']));
//获取子版块数据
$query="select * from son_module where id={$data_content['son_module_id']}";
$result_son=query($link,$query);
$data_son=mysqli_fetch_assoc($result_son);
//获取父版块数据
$query="select * from father_module where id={$data_son['father_module_id']}";
$result_father=query($link,$query);
$data_father=mysqli_fetch_assoc($result_father);

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <a href="index.php">首页</a> &gt; <a><?php echo $data_father['module_name']?></a> &gt; <a href="list_son.php?id=<?php
    echo $data_son['id']?>"><?php echo $data_son['module_name']?></a> &gt; <?php echo $data_content['title']?>
</div>
<div id="main" class="auto">
    <div class="wrap1">
        <div class="pages">
            <?php
            $query = "select count(*) from reply where post_id={$_GET['id']}";
            $count_reply = num($link, $query);
            $page = page($count_reply, 9);
            echo $page['html'];
            ?>
        </div>
        <a class="btn reply" href="reply.php?id=<?php echo $_GET['id']?>" ></a>
        <div style="clear:both;"></div>
    </div>
    <?php
    if($_GET['page']==1) {
    ?>
    <div class="wrapContent">
        <div class="left">
            <div class="face">
                <a target="_blank" href="">
                    <img width=120 height=120 src="<?php if ($data_content['photo'] != '') {
                        echo $data_content['photo'];
                    } else {
                        echo 'style/photo.jpg';
                    } ?>"/>
                </a>
            </div>
            <div class="name">
                <a href=""><?php echo $data_content['username'] ?></a>
            </div>
        </div>
        <div class="right">
            <div class="title">
                <h2><?php echo $data_content['title'] ?></h2>
                <span>阅读：<?php echo $data_content['times'] ?>&nbsp;|&nbsp;回复：15</span>
                <div style="clear:both;"></div>
            </div>
            <div class="pubdate">
                <span class="date">发布于：<?php echo $data_content['date'] ?> </span>
                <span class="floor" style="color:red;font-size:14px;font-weight:bold;">楼主</span>
            </div>
            <div class="content">
                <?php echo $data_content['content'] ?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
    }
    ?>
    <?php
    $query = "select member.username, member.photo, reply.date, reply.id, reply.content from member, reply where reply.post_id={$_GET['id']} and reply.member_id = member.id {$page['limit']}";
    $result_reply = query($link, $query);
    $floor = 1;
    while($data_reply = mysqli_fetch_assoc($result_reply)) {
        $data_reply['content']=nl2br(htmlspecialchars($data_reply['content']));
        ?>
    <div class="wrapContent">
        <div class="left">
            <div class="face">
                <a target="_blank" href="">
                    <img width="120" height="120"src="<?php if($data_reply['photo']!=''){echo $data_reply['photo'];}else{echo 'style/photo.jpg';}?>">
                </a>
            </div>
            <div class="name">
                <a href=""><?php echo $data_reply['username']?></a>
            </div>
        </div>
        <div class="right">

            <div class="pubdate">
                <span class="date">回复时间：<?php echo $data_reply['date']?></span>
                <span class="floor"><?php echo $floor++?>楼&nbsp;|&nbsp;<a href="#">引用</a></span>
            </div>
            <div class="content">
                <?php echo $data_reply['content']?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
    }
    ?>
    <div class="wrap1">
        <div class="pages">
            <?php
            echo $page['html'];
            ?>
        </div>
        <a class="btn reply" href="reply.php?id=<?php echo $_GET['id']?>" ></a>
        <div style="clear:both;"></div>
    </div>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>
