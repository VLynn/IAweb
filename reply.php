<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/29
 * Time: 上午7:10
 */
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/page.inc.php';
include 'admin/inc/tool.inc.php';
$info['title'] = "回复帖子页";
$info['css'] = array("style/public.css", "style/publish.css");

$link = connect();
if(!$member_id = is_login($link)) {
    skip('login.php', 'error', '请先登录!');
}

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    skip('index.php', 'error', '帖子id参数不合法!');
}
//获取详细帖子及发帖人数据
$query="select p.id,p.son_module_id,p.title,p.member_id,m.username from posts p,member m where p.id={$_GET['id']} and p.member_id=m.id";
$result_content=query($link,$query);
if(mysqli_num_rows($result_content)!=1){
    skip('index.php', 'error', '本帖子不存在!');
}
$data_content=mysqli_fetch_assoc($result_content);
$data_content['title']=htmlspecialchars($data_content['title']);
//对表单做验证
if(isset($_POST['submit'])) {
    if(empty($_POST['content'])) {
        echo "<script>alert('回复内容不得为空!')</script>";
        header("refresh:0;url='reply.php'");
    }
    $query = "insert into reply(post_id, content, date, member_id) values({$_GET['id']}, '{$_POST['content']}', now(), $member_id)";
    query($link, $query);
    if(mysqli_affected_rows($link)==1) {
        skip("show.php?id={$_GET['id']}", 'ok', '回帖成功!');
    }
    else {
        skip("reply.php?id={$_GET['id']}", 'error', '回复失败,请重试!');
    }
}

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div style="margin-top:55px;"></div>
<div id="position" class="auto">
    <a href="index.php">首页</a> &gt; 回复帖子
</div>
<div id="publish">
    <div>回复：由 <?php echo $data_content['username']?> 发布的 <?php echo $data_content['title']?></div>
    <form method="post">
        <textarea name="content" class="content"></textarea>
        <input class="reply" type="submit" name="submit" value="" />
        <div style="clear:both;"></div>
    </form>
</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>
