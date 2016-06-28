<?php
/**
 * Created by PhpStorm.
 * User: lynn
 * Date: 16/6/28
 * Time: 下午3:45
 */
include_once 'inc/config.inc.php';
include_once  'inc/mysql.inc.php';
include 'admin/inc/tool.inc.php';
$info['title'] = "帖子发布页";
$info['css'] = array("style/public.css", "style/publish.css");

$link = connect();
if(!$member_id = is_login($link)) {
    skip('login.php', 'error', '请先登录!');
}

//对表单做非空判断和非法字符判断
if(isset($_POST['self_submit'])) {
    if (!$_POST['module_id']) {
        echo "<script>alert('所属版块不得为空!')</script>";
        header("refresh:0;url='publish.php'");
    }
    else if (empty($_POST['title'])) {
        echo "<script>alert('标题不得为空!')</script>";
        header("refresh:0;url='publish.php'");
    }
    else if (mb_strlen($_POST['title']) > 66) {
        echo "<script>alert('标题不得超过66个字符!')</script>";
        header("refresh:0;url='publish.php'");
    }
    else if (empty($_POST['content'])) {
        echo "<script>alert('帖子内容不得为空!')</script>";
        header("refresh:0;url='publish.php'");
    }
    //插入数据到数据库
    $query = "insert into posts(son_module_id, title, content, date, member_id)
              values({$_POST['module_id']}, '{$_POST['title']}', '{$_POST['content']}', now(), $member_id)";
    query($link, $query);
    if(mysqli_affected_rows($link) == 1) {
        skip('index.php', 'ok', '发帖成功!');
    }
    else {
        skip('publish.php', 'error', '发帖失败, 请重试!');
    }
}

//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/header.inc.php';
?>

<div style="margin-top:55px;"></div>
<div id="position" class="auto">
		 <a>首页</a> &gt; 发布帖子
</div>
	<div id="publish">
		<form method="post">
			<select name="module_id">
				<option value="0">请选择一个版块</option>
                <?php
                $query = "select id, module_name from son_module";
                $result = query($link, $query);
                while($data = mysqli_fetch_assoc($result)) {
                    if(isset($_GET['son_module_id'])&&$_GET['son_module_id']==$data['id']) {
                        echo "<option value='{$data['id']}' selected='selected'>{$data['module_name']}</option>";
                    }else {
                        echo "<option value='{$data['id']}'>{$data['module_name']}</option>";
                    }
                }
                ?>
			</select>
			<input class="title" placeholder="请输入标题" name="title" type="text" />
			<textarea name="content" class="content"></textarea>
			<input class="publish" type="submit" name="self_submit" value="" />
			<div style="clear:both;"></div>
		</form>
	</div>

<?php
//将重复部分的布局单独拿出,放在admin/inc文件夹里面
include 'inc/footer.inc.php';
?>