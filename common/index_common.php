<?php
    //开启SESSION必须放在所有代码的最前面
    isset($_SESSION) || session_start();
    //必须是登录了才能进来
    if(!isset($_SESSION['username']) || !$_SESSION['username']){
      //跳转到登录页面
      header('Location:../login.php');
      exit;
    }
    require '../common/db_connect.php';
    // echo $_COOKIE['PHPSESSID'];