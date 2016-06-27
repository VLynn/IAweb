<?php
session_save_path("/tmp");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="http://v3.bootcss.com/favicon.ico">

<title>智慧农业管理平台</title>

<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

<link href="http://v3.bootcss.com/examples/signin/signin.css" rel="stylesheet">

<script src="./Signin Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

  </head>

  <body>
    <div class="container">
    <form class="form-signin" role="form" action="../logic/login_logic.php" method="post">
        <h2 class="form-signin-heading">智慧农业管理平台</h2>
        <label for="inputuser_id" class="sr-only">账号</label>
        <input type="txt" class="form-control" placeholder="账号" required="" autofocus="" name ="username">
        <label for="inputPassword" class="sr-only">密码</label>
        <input type="password" class="form-control" placeholder="密码" required="" name="password">
<!--        <div class="checkbox">-->
<!--          <label>-->
<!--            <input type="checkbox" value="remember-me"> Remember me-->
<!--          </label>-->
<!--        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
      </form>

    </div> <!-- /container -->
    <?php
//     }
//     else {
//     	echo "succcess";
//     } 
    ?>


    <script src="./Signin Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


</body>
</html>
