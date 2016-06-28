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
				<a>注册</a>
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
            <p id="news-desc">做好中国农业与国际农业接轨，了解世界农业高科技发展趋势.
                做好中国农业与国际农业接轨，了解世界农业高科技发展趋势.
                做好中国农业与国际农业接轨，了解世界农业高科技发展趋势.
            </p>
            <ul>
                <li>
                    <h4><a href="#">了解世界农业高科技发展趋势...</a></h4>
                    <p class="meta">2013-3-29</p>
                    <p>山东樱桃大量上市致市场价格回落近半.除了水果销售商，普通消费者也更愿意购买价格实惠的山东樱桃。
                        水果摊贩郑勇告诉记者，山东樱桃上市后，前来购买的人比以前多了许多。</p>
                </li>
                <li class="right-side">
                    <h4><a href="#">了解世界农业高科技发展趋势...</a></h4>
                    <p class="meta">2013-3-29</p>
                    <p>山东樱桃大量上市致市场价格回落近半.除了水果销售商，普通消费者也更愿意购买价格实惠的山东樱桃。
                        水果摊贩郑勇告诉记者，山东樱桃上市后，前来购买的人比以前多了许多。</p>
                </li>
                <li>
                    <h4><a href="#">了解世界农业高科技发展趋势...</a></h4>
                    <p class="meta">2013-3-29</p>
                    <p>山东樱桃大量上市致市场价格回落近半.除了水果销售商，普通消费者也更愿意购买价格实惠的山东樱桃。
                        水果摊贩郑勇告诉记者，山东樱桃上市后，前来购买的人比以前多了许多。</p>
                </li>
                <li class="right-side">
                    <h4><a href="#">了解世界农业高科技发展趋势...</a></h4>
                    <p class="meta">2013-3-29</p>
                    <p>山东樱桃大量上市致市场价格回落近半.除了水果销售商，普通消费者也更愿意购买价格实惠的山东樱桃。
                        水果摊贩郑勇告诉记者，山东樱桃上市后，前来购买的人比以前多了许多。</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- /News-section -->
    <!-- Works-section -->
    <div id="works" class="works-wrapper">
        <div class="container">
            <h3 class="titles titles-white-c">供应求购</h3>
            <p id="works-desc">Morbi in sem in metus facilisis adipiscing eget nec leo. Fusce sodales felis dolor. Nam varius enim non odio consectetur eget posuere neque dignissim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <ul id="filterOptions">
                <li class="active"><a href="#" class="all">All</a></li>
                <li><a href="#" class="Photography">Photography</a></li>
                <li><a href="#" class="graphicdesign">Graphic Design</a></li>
                <li><a href="#" class="video">Video</a></li>
                <li><a href="#" class="wordpress">Wordpress</a></li>
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
            <h3>Economists measure the total factor productivity of agriculture and by this measure agriculture in the United States is roughly 1.7 times more productive than it was in 1948.</h3>
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
<!--                <li>-->
<!--                    <div class="service-img"><img src="img/front/new.gif" alt="icon" /></div>-->
<!--                    <h3><a href="#">种植技术</a><span>(今日36)</span></h3>-->
<!--                    <p>帖子:3862</p>-->
<!--                </li>-->
<!--                <li class="right-side">-->
<!--                    <div class="service-img"><img src="img/front/old.gif" alt="icon" /></div>-->
<!--                    <h3><a href="#">大棚环境</a><span>(今日36)</span></h3>-->
<!--                    <p>帖子:3862</p>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="service-img"><img src="img/front/lock.gif" alt="icon" /></div>-->
<!--                    <h3><a href="#">疾病防治</a><span>(今日36)</span></h3>-->
<!--                    <p>帖子:3862</p>-->
<!--                </li>-->
<!--                <li class="right-side">-->
<!--                    <div class="service-img"><img src="img/front/new.gif" alt="icon" /></div>-->
<!--                    <h3><a href="#">疑难问题</a><span>(今日36)</span></h3>-->
<!--                    <p>帖子:3862</p>-->
<!--                </li>-->
            </ul>
        </div>
    </div>
    <!-- /Services-section -->
    <!-- About-section -->
    <div id="team" class="about">
        <div class="container">
            <h3 class="titles titles-white-c">农事杂谈</h3>
            <p id="about-desc">Here are the three world famous farmer who are using our system. You can search their information online or contact with them with on our webpage.</p>
            <ul>
                <li>
                    <img src="img/about/a1.jpg" alt="staff" />
                    <h3>Han Doe</h3>
                    <h6>Guangxi Liuzhou</h6>
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
                    <h3>Feng Chou</h3>
                    <h6>Hunan Zhuzhou</h6>
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
                    <h3>QingFeng Liu</h3>
                    <h6>Ningxia Wuwei</h6>
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
                <h4>IA.com, Inc. (NASDAQ: INAG), a Fortune 500 company based in Shanghai,
                    opened on the World Wide Web in July 2015 and today offers Earth’s Biggest Intelligence Agriculture.</h4>
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
                    <input type="text" name="name" class="fields" id="name" placeholder="Your Name..." />
                    <input type="text" name="email" class="fields" id="email" placeholder="Your Email..."/>
                    <input type="text" name="subject" class="fields" id="subject" placeholder="Email Subject..."/>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message..."></textarea>
                    <input type="submit" id="send-btn" name="send-btn" value="Send" />
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


