<?php
include_once 'inc/config.inc.php';
include_once  'inc/mysql.inc.php';
include 'admin/inc/tool.inc.php';

$link = connect();
$member_id=is_login($link);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="icon" href="http://v3.bootcss.com/favicon.ico">
    <!--Page Title-->
    <title>[论坛]智慧农业</title>
    <!--Meta Tags-->
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!-- Set Viewport-->
    <meta name="viewport" content="user-scalable=no,initial-scale=1.0, maximum-scale=1.0 width=device-width" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <!--Fav and touch icons-->
    <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png">
</head>
<body>
    <div class="header_wrap">
        <div id="header" class="auto">
            <div class="logo">[论坛]智慧农业</div>
            <div class="navi">
                <a class="hover">首页</a>
                <a class="hover" href="admin/login.php" target="_blank">管理</a>
            </div>
            <div class="serarch">
                <form>
                    <input class="keyword" type="text" name="keyword" placeholder="搜索..." />
                    <input class="submit" type="submit" name="submit" value="" />
                </form>
            </div>
            <div class="login">
                <?php
                if($member_id) {
                    $str = <<<A
                <a>您好！{$_COOKIE['name']}</a>
                <span style="color:#fff;">|</span> <a href="logout.php">退出</a>
A;
                    echo $str;
                }
                else {
                    $str = <<<A
				<a href="login.php">登录</a>&nbsp;
				<a href="register.php">注册</a>
A;
                    echo $str;
                }
                ?>
            </div>
        </div>
    </div>
    <div style="margin-top:40px;"></div>

    <!-- News-section -->
    <div id="news" class="news">
        <div class="container">
            <h3 class="titles">农业快讯</h3>
            <p id="news-desc">做好中国农业与国际农业接轨，了解世界农业高科技发展趋势
            </p>
            <ul>
                <li>
                    <h4><a href="#">2016年第一届深圳绿博会农业科技创新创业大赛火热开启!</a></h4>
                    <p class="meta">2016-6-25</p>
                    <p>“2016年第一届绿博会农业科技创新创业”大赛已经开始接受报名，这次大赛主要是面向“农业科技类创新”的创业项目，
                        反对针对农业领域进行创新的海内外科技创业人员（专利技术、科技成果持有者）、高校科研创业团队所拥有的科技项目均可报名参赛。
                    </p>
                </li>
                <li class="right-side">
                    <h4><a href="#">16年6月23日德州辣椒价格</a></h4>
                    <p class="meta">2016-6-23</p>
                    <p>冷库货：<br>
                    　　　　三樱椒：5.70-5.80元/斤（9成以上精品）。<br>
                    　　　　红太阳：6.20-6.30元/斤（统货）。<br>
                    　　　　花　皮（一般）：1.30-1.40元/斤。<br>
                    　　　　冷冻北京红：3500元/吨（出成率24-25）。</p>
                </li>
                <li>
                    <h4><a href="#">作为农产品电商的一员，南北干货家们遇到了什么问题</a></h4>
                    <p class="meta">2016-6-29</p>
                    <p>前不久的广东“徐闻县菠萝事件”让不少人对现如今的农产品电商平台一通诟病.<br>一些优质南北干货货源原产地的农民朋友还是固守一手交钱一手交货的交易模式，完全抵触线上交易，
                        因为不了解线上的运作过程，生怕自己吃亏而盲目拒绝。</p>
                </li>
                <li class="right-side">
                    <h4><a href="#">锡山应季采蓝莓 首选智慧恬园</a></h4>
                    <p class="meta">2016-6-16</p>
                    <p>智慧恬园的蓝莓有个好听的名字——蓝度，释意蓝莓种植纯生态有标准，最注重品质与健康！<br>说它是纯生态蓝莓，是因为蓝莓在种植过程中全程采用有机肥，
                        没有使用任何农药，全部采用人工除草，可以直接采了吃。<br>走进恬园农场，就可以看到一颗颗结实的紫蓝珠挂在枝头，
                        饱满硬实、甚是诱人，摘下三两粒入口轻嚼，果浆丰富、酸甜可口。</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- /News-section -->
    <!-- Works-section -->
    <div id="works" class="works-wrapper">
        <div class="container">
            <h3 class="titles titles-white-c">供应求购</h3>
            <p id="works-desc">暂无子版块...</p>
            <ul id="filterOptions">
                <li class="active"><a href="#" class="all"> 总 览 </a></li>
                <li><a href="###" class="Photography."> 图 集 </a></li>
                <li><a href="###" class="graphicdesign."> 设 计 </a></li>
                <li><a href="###" class="video."> 视 频 </a></li>
                <li><a href="###" class="wordpress."> 播 客 </a></li>
            </ul>

            <ul class="ourHolder">
                <li class="gallery-item" data-id="id-1" data-type="wordpress">
                    <img class="gallery-img" src="img/gallery/1.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-2" data-type="Photography">
                    <img class="gallery-img" src="img/gallery/2.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-3" data-type="video">
                    <img class="gallery-img" src="img/gallery/3.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-4" data-type="graphicdesign">
                    <img class="gallery-img" src="img/gallery/4.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-5" data-type="graphicdesign">
                    <img class="gallery-img" src="img/gallery/5.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-6" data-type="Photography">
                    <img class="gallery-img" src="img/gallery/6.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-7" data-type="video">
                    <img class="gallery-img" src="img/gallery/7.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-8" data-type="wordpress">
                    <img class="gallery-img" src="img/gallery/8.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
                <li class="gallery-item" data-id="id-9" data-type="Photography">
                    <img class="gallery-img" src="img/gallery/9.jpg" alt="img" />
                    <a class="fancybox" href="img/gallery/fs.jpg"><div class="overlay-works">
                        </div></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /Works-section -->
    <!-- Quote-section -->
    <div class="quote">
        <div class="container">
            <h3>经济学家衡量了农业生产率的全部要素,通过这一措施
                美国的农业生产率达到1948年的1.7倍。</h3>
        </div>
    </div>
    <!-- /Quote-section -->
    <!-- Services-section -->
    <div id="services">
        <div class="container">
            <h3 class="titles"><a>技术交流</a></h3>
            <p class="desc">各种养殖技术、种植技术、市场信息、疾病防治、疑难问题等交流专区！</p>
            <ul class="services">
                <?php
                //目前father_module_id=6是写死的,以后需要列出所有的父版块
                $query_son = "select * from son_module where father_module_id=6";
                $result_son = query($link, $query_son);
                if(mysqli_num_rows($result_son)) {
                    $count = 1;
                    while($data_son = mysqli_fetch_assoc($result_son)) {
                        $query_today = "select count(*) from posts where son_module_id = {$data_son['id']} and date > CURDATE()";
                        $count_today = num($link, $query_today);
                        $query_total = "select count(*) from posts where son_module_id = {$data_son['id']}";
                        $count_total = num($link, $query_total);
                        if(count/2) {
                            echo "<li>";
                        }
                        else {
                            echo "<li class='right-side'>";
                        }
$html = <<<A
                    <div class="service-img"><img src="img/front/new.gif" alt="icon" /></div>
                    <h3><a href="list_son.php?id={$data_son['id']}">{$data_son['module_name']}</a><span>(今日$count_today)</span></h3>
                    <p>帖子:$count_total</p>
                </li>
A;
                        echo $html;
                        $count++;
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- /Services-section -->
    <!-- About-section -->
    <div id="team" class="about">
        <div class="container">
            <h3 class="titles titles-white-c">农事杂谈</h3>
            <p id="about-desc">清明下种，谷雨插秧，人误地一时，地误人一年，雨春风冻人，不冻水，今冬麦盖三层被，
                来年枕着馒头睡，晚稻一过秋，十有九不收，白露早，寒露迟，秋分种麦正当时.</p>
            <ul>
                <li>
                    <img src="img/about/a1.jpg" alt="staff" />
                    <h3>韩二贵</h3>
                    <h6>广西 柳州</h6>
                    <div class="social-staff">
                        <ul>
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="dribbble"><a href="#"></a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <img src="img/about/a2.jpg" alt="staff" />
                    <h3>冯稠</h3>
                    <h6>湖南 株洲</h6>
                    <div class="social-staff">
                        <ul>
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="dribbble"><a href="#"></a></li>
                        </ul>
                    </div>
                </li>
                <li class="right-side">
                    <img src="img/about/a3.jpg" alt="staff" />
                    <h3>刘庆峰</h3>
                    <h6>宁夏 武威</h6>
                    <div class="social-staff">
                        <ul>
                            <li class="facebook"><a href="#"></a></li>
                            <li class="twitter"><a href="#"></a></li>
                            <li class="dribbble"><a href="#"></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- /About-section -->
    <!-- GoogleMap-section -->
    <!-- /GoogleMap-section -->
    <!-- Contact-section -->
    <div id="contact" class="contact">
        <div class="container">
            <h3 class="titles">联系方式</h3>
            <div class="contact-desc">
                <h4>“智慧农业系统”立足现代农业，融入国际领先的“物联网、移动互联网、云计算”技术，
                    借助个人电脑、智能手机，实现对农业生产现场温度、湿度、土壤的实时监测，
                    并对大棚、温室的灌溉、通风、降温、增温等农业设施实现远程自动化控制。<br>
                    系统可帮助广大农业工作者随时随地掌握农作物生长状况及环境变化趋势，
                    为用户提供一套高效便捷、功能强大的农业监控解决方案。</h4>
                <p>4800 Caoan Highway, Jiading, Shanghai, China</p>
                <p>+012 345 678 9</p>
                <div class="social">
                    <ul>
                        <li class="facebook"><a href="#"></a></li>
                        <li class="twitter"><a href="#"></a></li>
                        <li class="behance"><a href="#"></a></li>
                        <li class="dribbble"><a href="#"></a></li>
                        <li class="linkedin"><a href="#"></a></li>
                        <li class="clearfix"></li>
                    </ul>
                </div>
            </div>
            <div class="contact-form-holder">
                <form method="POST" id="contact-form" name="contact-form">
                    <input type="text" name="name" class="fields" id="name" placeholder="姓名..." />
                    <input type="text" name="email" class="fields" id="email" placeholder="邮箱..."/>
                    <input type="text" name="subject" class="fields" id="subject" placeholder="副邮箱..."/>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="问题..."></textarea>
                    <input type="submit" id="send-btn" name="send-btn" value="发送" />
                </form>
                <div class="success">
                    We'll answer you as soon as possible.
                </div>
            </div>
        </div>
    </div>
    <!-- /Contact-section -->
    <!-- Footer-section -->
    <div class="footer">
        <div class="container">
            <p id="cp-text">Copyright 2015. Team IA.</p>
        </div>
    </div>

    <!-- /Footer-section -->
    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/tinynav.min.js"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.animate.js"></script>
    <script type="text/javascript" src="js/jquery.anchorScroll.js"></script>
    <script type='text/javascript' src='js/jquery.easing.1.3.js'></script>
    <script type="text/javascript" src="js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="js/ajax-actions.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    </body>
</html>


