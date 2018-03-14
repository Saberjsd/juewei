<?php
require '../common/db_connect.php';
if(isset($_POST)){
	foreach($_POST as $k=>$v){
		$$k=$v;
	}
}
$data=$mydb->getOneData('user','username','username="'.$username.'"');
if($data!=NULL){
	echo json_encode(array('reg'=>'ufailure'));
		exit;
}
$_POST['passwd']=md5($_POST['passwd']);
$r=$mydb->insertData('user',$_POST);
if($r!=false){
	echo json_encode(array('reg'=>'success'));	
}

