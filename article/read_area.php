<?php
	require '../common/index_common.php';
	$data=$mydb->getData('article','*','status=1');
	$content=array();

	foreach ($data as $key => $value) {
		
		$str=$value['content'];
		//过滤标签
		$new1=strip_tags ($value['content']);
		// echo mb_substr ($new1,0,50,'utf-8');
		//截取图片的正则
		$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
		preg_match_all($pattern,$str,$match); 
		var_dump($match); 
	}
	// var_dump($content);
?>