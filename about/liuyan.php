<?php
    isset($_SESSION) || session_start();
    //必须是登录了才能进来
    if(!isset($_SESSION['username']) || !$_SESSION['username']){
      //跳转到登录页面
      header('Location:../admin/login.php');
      exit;
    }
    
    require '../common/db_connect.php';
    // $w = $mydb -> getOneData('user', 'photo', 'username = "'.$_SESSION['username'].'"');
    $x = $mydb -> getData('liuyan', 'content, username, dates');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../index/head.css">
    <link rel="stylesheet" href="../index/foot.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="../index/js_index/aj.js"></script>
    <script src="../index/js_index/head.js"></script>
    <link rel="stylesheet" href="./css-we/mianze.css">
    <title>留言联系</title>
</head>
<body>
<?php 
        require '../index/head.php'; 
     ?>
<div class="mydiv">
    <div class="divul">
        <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="juewei.php">关于觉唯</a></li>
            <li role="presentation"><a href="mianze.php">免责声明</a></li>
            <li role="presentation"><a href="yinsi.php">关于隐私</a></li>
            <li role="presentation" class="active"><a href="#">留言联系</a></li>
        </ul>
    </div>
    <div class="content11">
        <div class="head11">
            <h3 class="title">留言联系</h3>
        </div>
        <div class="arti">
            <p>
                <strong>建议反馈</strong><br>
                <span>邮箱：javin@jiawin.com</span><br>
                <span>格式：【建议咨询】xxxxx（标题）xxxxx</span>
            </p>
            <p>
                <strong>广告合作</strong><br>
                <span>邮箱：javin@jiawin.com</span><br>
                <span>格式：【广告合作】xxxxx（标题）xxxxx</span>
            </p>
            <p>
                <strong>WordPress服务（暂不支持）</strong><br>
                <span>邮箱：javin@jiawin.com</span><br>
                <span>格式：【 WP服务 】xxxxx（标题）xxxxx</span>
            </p>
        </div>
        <div class="pinlun">
            <div class="pin-main">
                <div class="pin-main-img">
                    <img src="<?php echo $w['photo'];?>">
                </div>
                <div class="textar">
                    <textarea placeholder="说点什么吧..."></textarea>
                </div>
                <button>我要评论</button>
            </div>
            <p class="pinglunp">Hello <a href="#"><?php echo $_SESSION['username']?></a>！ <a href="#">退出</a></p>
            <h4>全部评论/<strong>233</strong></h4>
            <div class="forum">
                <ol>
                    <!-- <li>
                        <div>
                        <div class="forumdiv">
                            <a href="#"><img src="img-yp/touxiang.jpg"></a>
                        </div>
                        <div class="pinglun-content">
                            <p>网站很漂亮，出售吗</p>
                                <span class="span-name">chenijnchun</span>
                                <span class="span-date">2012-10-19</span> -->
                                <!-- <span class="span-hui"><a href="#">回复</a></span> -->
<?php
    foreach ($x as $k => $v) {
        echo '
            <li>
                <div>
                    <div class="forumdiv">
                        <a href="#"><img src="img-yp/touxiang.jpg"></a>
                    </div>
                    <div class="pinglun-content">
                    <p>'.$v['content'].'<p>
                    <span class="span-name">'.$v['username'].'</span>
                    <span class="span-date">'.date('Y-m-d', strtotime($v['dates'])).'</span>
                    </div>
                </div>
            </li>';
    };
?> 
                        </div>
                        </div>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<?php 
    require '../index/foot.php';
?>
</body>
</html>