<?php

require '../common/db_connect.php';

 $child_cates   = $mydb->getData( 'cate','cid,catename','1 order by cid ASC');
        $ca = array();
        foreach ($child_cates as $k => $v) {
            $ca[$v['cid']] = $v['catename'];
      }
//var_dump($data);
$num        = $mydb->getOneData('article','COUNT(artid) AS nums','status = 1');
$shownum= 8;

$page= isset($_GET['page']) ? $_GET['page'] : 1;
$totalpage  = ceil($num['nums']/$shownum);
        if($page > $totalpage){
            $page   = $totalpage;
        }
        $start      = ($page-1)*$shownum;
   $data=$mydb->getData('article','cateid,title,content,addtime,likes,views,comments','status=1 order by artid ASC LIMIT '.$start.','.$shownum); 

$pic=$mydb->getData('image','title,content,addtime,likes,views,comments','status=1 order by imgid DESC LIMIT 0,8');
