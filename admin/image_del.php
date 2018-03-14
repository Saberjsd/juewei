<?php
require '../common/admin_common.php';
if(isset($_POST['imgid'])){
	$imgid = $_POST['imgid'];
	$r  = $mydb->updateData('image',array('status'=>0),'imgid='.$imgid);
	if($r === false){
        echo json_encode(array('r'=>'fail'));
    }else{
        echo json_encode(array('r'=>'ok'));
    }
}