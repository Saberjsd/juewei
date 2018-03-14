<?php

	require '../common/index_common.php';
	$artid=$_GET['artid'];
	$resultno=$mydb->getOneData('article','views,likes','artid='.$artid.' and status=1');
	$viewno=$resultno['views']+1;
	
	$data1=array('views'=>$viewno);
	$view=$mydb->updateData('article',$data1,'artid='.$artid);
	