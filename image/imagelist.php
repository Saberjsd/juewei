<?php 
require '../common/db_connect.php';
// $imglist  = $mydb->getData('image','imgid,cateid,title,content,likes','status = 1');
    //加载栏目
    $catelist = $mydb->getData('cate','cid,catename','pid = 2');
    //栏目条件
    $where = '';
    if(isset($_GET['cid'])){
        $where = '  AND cateid ='.$_GET['cid'];
    }
    if(isset($_GET['a']) && $_GET['a'] == 'clear'){
        $where = '';
    }
    
    if(isset($_GET['key'])){
        if($_GET['key']== 'likes'){
            $where .= ' ORDER BY likes ';
            
        }
        if($_GET['key']== 'views'){
            $where .= ' ORDER BY views ';
            
        }
        if($_GET['key']== 'comments') {
            $where .= ' ORDER BY comments ';
            
        }
    }else {
        $where .= ' ORDER BY addtime DESC ';
    }

    // 当前页码
    $page     = 1;   
    // 每页显示
    $pagenum  = 8;
    if(isset($_GET['action']) && $_GET['action'] == 'load'){
        $page = $_GET['page'];
        $page++;
        $sql    = ' LIMIT '.($page-1)*$pagenum.','.$pagenum;
        $imglist   = $mydb->getData('image','imgid,cateid,title,content,addtime,author',' status = 1 '.$where.$sql);
        array_unshift($imglist,$page);
        echo json_encode($imglist);
        exit;
    }
    $sql    = ' LIMIT '.$page*$pagenum;
    $imglist   = $mydb->getData('image','imgid,cateid,title,content,addtime,author',' status = 1 '.$where.$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>美图列表</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.js"></script>
    <link href="./css_waterfall/picture.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="../article/css_article/article.css"/> -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='./js_waterfall/waterfall.js'></script>

    <link rel="stylesheet" href="../index/head.css">
    <link rel="stylesheet" href="../index/foot.css">
    <script src="../index/js_index/aj.js"></script>
    <script src="../index/js_index/head.js"></script>
</head>
<body>
<?php 
        require '../index/head.php'; 
     ?>
<div class="head">
    
        <!-- <div class="guide" id="guide"> -->
        <div class="group" id="group">
            <ul>
                <li class="colum">
                    <a href="./imagelist.php?a=clear" class="current"><i class="fa"><img src="ico/bookmark.png "/></i> &nbsp;不限类别&nbsp; </a>
                    <i class="fa fa_up"><img src="ico/pull-bottom.png "/></i>
                    <ul class="sub">
                    <?php 
                        foreach ($catelist as $cate) {
                            echo '<li><a href="./imagelist.php?cid='.$cate['cid'].'">'.$cate['catename'].'</a></li>';
                        }
                    ?>
                        
                    </ul>
                </li>
                <li class="sort">
                    <a href="#" class="current"><i class="fa"><img src="ico/pull-top-bottom.png "/></i></i> &nbsp;最新发布 &nbsp; </a><i class="fa fa_up"><img src="ico/pull-bottom.png "/></i>
                    <ul class="sub">
                        <li><a href="./imagelist.php?key=likes">喜欢最多</a></li>
                        <li><a href="./imagelist.php?key=views">浏览最大</a></li>
                        <li><a href="./imagelist.php?key=comments">评论最多</a></li>
                    </ul>   
                </li>
                <li class="timeframe">
                    <a href="#" class="current"><i class="fa"><img src="ico/time.png "/></i></i>  &nbsp;不限时间 &nbsp; </a><i class="fa fa_up"><img src="ico/pull-bottom.png "/></i>
                    <ul class="sub">
                        <li><a href="">一周内</a></li>
                        <li><a href="">一月内</a></li>
                        <li><a href="">一年内</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <!-- </div> -->

</div>

<div class="mag"></div>

<div class="content11" page="<?=$page?>">


    <?php 
        foreach ($imglist as $k1 => $v1) {
            $ca     = explode(',', $v1['content']);
            echo '<div class="imgbox"><!-- 盒子开始 -->
                    <div class="main">
                        <div class="box-top">
                            <img src="'.$ca['1'].'" alt="">
                            <div class="mys">
                                <div class="detail"><a href=""></a></div>
                            </div>
                        </div>
                        <div class="img-title"><a href="">'.$v1['title'].'</a></div>
                        <div class="like">
                            <div class="nav-right">
                                <ol>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ol>
                            </div>
                            <div class="sig">
                                <ul class="sig-ul">
                                    <li>0</li>
                                    <li><a class="heart" href="#"></a></li>
                                    <li>0</li>
                                    <li><a class="item-comment" href="#"></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="comment">该美图还没有评论,快来评论吧</div>
                    </div>
                </div><!-- 盒子结束 -->';
        }
    ?>

</div>

</body>
</html>