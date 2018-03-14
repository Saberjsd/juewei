<?php
require '../common/admin_common.php';
if(isset($_POST['artid'])){
	$artid = $_POST['artid'];
	$r  = $mydb->updateData('article',array('status'=>0),'artid='.$artid);
	if($r === false){
        echo json_encode(array('r'=>'fail'));
    }else{
        echo json_encode(array('r'=>'ok'));
    }
}