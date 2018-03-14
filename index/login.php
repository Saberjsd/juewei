<?php
isset($_SESSION) || session_start();
require '../common/db_connect.php';
if(isset($_POST)){
	foreach($_POST as $k=>$v){
		$$k=$v;
	}
}
$data=$mydb->getOneData('user','username,passwd,uid,photo','username="'.$username.'"');
if($data==NULL){
	 echo json_encode(array('r1'=>'username_invail'));
     exit;
}

if($data['passwd']!=md5($passwd)){

                echo json_encode(array('r1'=>'passwd_invail'));
                exit;
            }
 $_SESSION['username']   = $username;
  $_SESSION['id']        = $data['uid'];
  // $match=explode(',', $data['photo']);
  // $_SESSION['photo']     =$match['1'];
  echo json_encode(array($_SESSION));
  setcookie('username',$username,time()+30*24*3600);