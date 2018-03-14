<?php 
	require '../common/admin_common.php';
	if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        session_destroy();
        header('Location:./login.php');
        // exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>后台管理系统</title>		
		
		<!-- Import google fonts - Heading first/ text second -->
      
 
		<!-- Favicon and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />

	    <!-- Css files -->
	    <link href="assets/css/bootstrap.min.css" rel="stylesheet">		
		<link href="assets/css/jquery.mmenu.css" rel="stylesheet">		
		<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="assets/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	    <link href="assets/css/style.min.css" rel="stylesheet">
		<link href="assets/css/add-ons.min.css" rel="stylesheet">
	</head>

<body>
	<!-- start: Header -->
	<div class="navbar" role="navigation">
	
		<div class="container-fluid">		
			
			<ul class="nav navbar-nav navbar-actions navbar-left">
				<li class="visible-md visible-lg"><a href="<?=$lgpage.'#' ?>" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
				<li class="visible-xs visible-sm"><a href="<?=$lgpage ?>" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>			
			</ul>
	
	        <ul class="nav navbar-nav navbar-right">
				<li class="dropdown visible-md visible-lg">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-avatar" src="assets/img/avatar.jpg" alt="user-mail"><?= $_SESSION['admin']?></a>
	      		</li>
				<li ><a href="header.php?action=logout"><i class="fa fa-power-off"></i></a></li>
			</ul>
			
		</div>
		
	</div>
	<!-- end: Header -->

		<div class="container-fluid content">
	
		<div class="row">
				
			<!-- start: Main Menu -->
			<div class="sidebar ">
								
				<div class="sidebar-collapse">
					<div class="sidebar-header t-center">
                        <span><i class="fa fa-space-shuttle fa-3x blue"></i></span>
                    </div>										
					<div class="sidebar-menu">						
						<ul class="nav nav-sidebar">

							<li><a href="index.php"><i class="fa fa-laptop"></i><span class="text"> 首页</span></a></li>
							<li>
								<a href="JavaScript:void(0)"><i class="fa fa-file-text"></i><span class="text"> 文章</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="article_list.php"><i class="fa fa-list-alt"></i><span class="text"> 文章列表</span></a></li>
									<li><a href="article_update.php"><i class="fa fa-pencil"></i><span class="text"> 文章修改</span></a></li>
								</ul>
							</li>
							<li>
								<a href="JavaScript:void(0)"><i class="fa fa-picture-o"></i><span class="text"> 美图</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									
									<li><a href="image_list.php"><i class="fa fa-list-alt"></i><span class="text"> 美图列表</span></a></li>
									<li><a href="image_update.php"><i class="fa fa-pencil"></i><span class="text"> 美图修改</span></a></li>
								</ul>
							</li>
							
						</ul>
					</div>					
				</div>
				<div class="sidebar-footer">					
								
				</div>	
				
			</div>
			<!-- end: Main Menu -->