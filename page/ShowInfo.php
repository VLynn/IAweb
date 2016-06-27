<!DOCTYPE html>
<!-- saved from url=(0041)http://v3.bootcss.com/examples/dashboard/ -->
<html lang="zh-CN">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 涓婅堪3涓猰eta鏍囩*蹇呴』*鏀惧湪鏈�墠闈紝浠讳綍鍏朵粬鍐呭閮�蹇呴』*璺熼殢鍏跺悗锛�-->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">

    <title>智慧农业</title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./Dashboard Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Homepage.php">智慧农业</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="搜索...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include '../logic/url.php' ?>
          <ul class="nav nav-sidebar">
            <li class="active"><a href=<?php echo $ShowInfoUrl ?>>农户信息<span class="sr-only">(current)</span></a></li>
            <li><a href=<?php echo $GreenhouseInfoUrl ?>>大棚信息</a></li>
            <li><a href=<?php echo $SensorInfoUrl ?>>温湿度信息</a></li>
            <li><a href=<?php echo $ControlInfoUrl ?>>温湿度控制</a></li>
          </ul>
        </div>
       </div>
      </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h1 class="sub-header">农户信息总览</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>姓名</th>
                  <th>性别</th>
                  <th>电话</th>
                  <th>地址</th>
                  <th>描述</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../logic/connect.php';
				$query ="select * from farmer_info where checked=true;";
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
					    <td class="checktd">
                          <a href='../logic/Delete.php?user_id=<?php echo $row[0] ?>' onclick="return confirm('确定删除该用户?');">[移除]</a>
					    </td>
					<tr>
    			
				<?php }?>
              </tbody>
            </table>
            <h1 class="sub-header">待审核农户信息</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>电话</th>
                    <th>地址</th>
                    <th>描述</th>
                </tr>
              </thead>
              <tbody>
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
					    <td class="checktd">
                            <a href='../logic/Check.php?user_id=<?php echo $row[0]?>'onclick="return confirm('确认通过审核?');">[通过]</a>
					    </td>
					</tr>
				<?php }?>
               </tbody>
            </table>
          </div>
        </div>
      </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Dashboard Template for Bootstrap_files/jquery.min.js"></script>
    <script src="./Dashboard Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./Dashboard Template for Bootstrap_files/holder.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./Dashboard Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>
  

<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" preserveAspectRatio="none" style="visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs></defs><text x="0" y="10" style="font-weight:bold;font-size:10pt;font-family:Arial, Helvetica, Open Sans, sans-serif;">200x200</text></svg>
  </body>
</html>