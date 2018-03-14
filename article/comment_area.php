<?php

	require '../common/index_common.php';	
	// $result=$mydb->getData('artcomment','*',1);
	$artid=$_POST['artid'];
	$content=$_POST["content"];
	
	if(isset($content)){
		date_default_timezone_set('Asia/Chongqing');
        $time = date('Y-m-d H-i-s');
		$data=array('content'=>$content,'artid'=>$artid,'addtime'=>$time);
		
		$r=$mydb->insertData('artcomment',$data);
		if($r){
			echo json_encode(array('r1'=>'ok'));
		}
	}
	
	// var_dump($r);