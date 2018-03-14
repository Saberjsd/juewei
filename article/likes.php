<?php
require '../common/index_common.php';
	$artid=$_GET['artid'];
	$resultno=$mydb->getOneData('article','views,likes','artid='.$artid.' and status=1');

	$likesno=$resultno['likes']+1;
	$data2= array('likes' =>$likesno );
	$r = $mydb->updateData('article',$data2,'artid='.$artid);

	if($r){
		echo json_encode(array("r1"=>"ok"));
	}

	