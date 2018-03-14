
<?php
	isset($_SESSION) || session_start();
    //设置当前页面编码
    header('Content-Type:text/html; charset=UTF-8');
    if(isset($_POST['username']) && trim($_POST['username'])){
        //接收数据
        $username   = trim($_POST['username']); //去除用户不小心输入的空格
        $passwd     = $_POST['passwd'];
        
        require '../common/db_connect.php';
        // exit ('1231231');
        $r      = $mydb->getOneData('admin','aid, username, passwd',  'username = "'.$username.'"');
        if($r === false){
            echo json_encode(array('r1'=>'sql_error'));
            exit;
        }
        //判断账号是否存在
        if(!$r['username']){
            // var_dump($member);
            echo json_encode(array('r1'=>'username_invail'));
            exit;
        }
        //检查密码是不是正确
        if($r['passwd'] != md5($passwd)){
            echo json_encode(array('r1'=>'passwd_invail'));
            exit;
        }

        // var_dump($_POST);
        //记住账号密码
        if(isset($_POST['remember']) && $_POST['remember'] = 'checked'){
        	// echo '111111';
			// setcookie('username',       $r['username'],             time() + 30*24*3600);
	  //       setcookie('passwd',         $passwd,                    time() + 30*24*3600);
	        setcookie('PHPSESSID',   $_COOKIE['PHPSESSID'],   		time() + 24*3600);
		}


        $_SESSION['admin']   = $r['username'];
        // $_SESSION['aid']        = $r['aid'];
        // $_SESSION['tel']        = $r['tel'];
        
        
        echo json_encode(array('r1'=>'ok'));
        exit; 
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>后台管理系统登录</title>		

		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" /> 

	    <!-- Css files -->
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet">		
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet">		
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">			    
	    <link href="assets/css/style.min.css" rel="stylesheet">
		<link href="assets/css/add-ons.min.css" rel="stylesheet">
		<style>
			footer {
				display: none;
			}
		</style>

	   
	</head>
</head>

<body>
	<div class="container-fluid content">
		<div class="row">
			<div id="content" class="col-sm-12 full">
				<div class="row">
					<div class="login-box">
					
						<div class="header">
						登录到管理系统
						</div>

						<form class="form-horizontal login"  method="post">
						
							<fieldset class="col-sm-12">
								<div class="form-group">
									<div class="controls row">
										<div class="input-group col-sm-12">	
											<input type="text" class="form-control" id="username" placeholder="用户名"/>
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
										</div>
										<span> <br></span>	
									</div>
								</div>
							
								<div class="form-group">
									<div class="controls row">
										<div class="input-group col-sm-12">	
											<input type="password" class="form-control" id="passwd" placeholder="密码"/>
											<span class="input-group-addon"><i class="fa fa-key"></i></span>
										</div>
										<span> <br></span>	
									</div>
								</div>

								<div class="confirm">
									<input type="checkbox" name="remember" id="remember" checked="false" />
									<label for="remember">自动登录</label>
								</div>	

								<div class="row">
							
									<button type="button" class="btn btn-lg btn-primary col-xs-12" id="login-btn">登录</button>
							
								</div>
								
							</fieldset>	

						</form>	
						<a class="pull-left" href="page-login.html#">忘记密码?</a>
						<div class="clearfix"></div>				
						
					</div>
				</div><!--/row-->
		
			</div>	
			
		</div><!--/row-->		
	
		
		
	</div><!--/container-->
		
	

			<script src="assets/js/jquery-2.1.1.min.js"></script>


		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>

	<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>	
	
	
	<!-- page scripts -->
	
	<!-- theme scripts -->
	<script src="assets/js/SmoothScroll.js"></script>
	<script src="assets/js/jquery.mmenu.min.js"></script>
	<!-- <script src="assets/js/core.min.js"></script> -->
	
	<!-- inline scripts related to this page -->
	<script src="./js/login.js"></script>
	
	<!-- end: JavaScript-->
	
</body>
</html>