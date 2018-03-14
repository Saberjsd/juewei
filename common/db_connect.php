<?php
    require '../class/DB.php';
    //使用自己的类
    $dbconfig   = array(
            'host'=>'127.0.0.1',
            'username'=>'root',
            'passwd'=>'root',
            'dbname'=>'jw',
            'port'=>3306
        );
    $mydb       = new DB($dbconfig);
