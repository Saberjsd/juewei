
	
		<header id="header">
			<div class="content">
				<!-- <div class="nav"> -->
					<div id='logo'><a href="../index/index.php"></a></div>
					<ul id='nav-list'>
						<li>
							<a href="../article/article.php">文章</a>
						</li>
						<li>
							<a href="../image/imagelist.php">美图</a>
						</li>
						<li>
							<a href="../about/juewei.php">关于</a>
						</li>
						<li>
							<a href="../about/liuyan.php">留言</a>
						</li>
					</ul>
					<div id='search'>
						<form method='get' action=''>
							<span class='search-icon sicon1'><img src="../index/img_index/search.png"/></span>
							<span class='input'>
							<div class="search-input-wrapper">
								<span class='search-icon'><img src="../index/img_index/search.png"/></span>
							<span class='input'>
									<input type="hidden"/>
								<input type="search"  class='search-input' name='' />
								<button type='submit' class='sbtn'></button>
								<!--<div class="close"><img src="img_index/close.png" alt="" /></div>
								</span>-->

					</div>
					</form>
				</div>

				<div class="user">
					<div class='login'>
						<a href="javascript:;">登录</a>
					</div>
					<div class='reg'>
						<a href="javascript:;">注册</a>
					</div>
					<div class="my hide">
					<div class="user_admin">我的<img src="" alt="" /></div>
					<div class="user_img"><img src="" alt="" width='30' height='30'/></div>
						<div class="user_panel">
							<a href=""><?=isset($_SESSION['username'])? $_SESSION['username'] :'' ?></a>
							<a href="../article/up_article.php">发布文章</a>
							<a href="../image/up_image.php">上传美图</a>
							<a href="../person/updateinfo.php">编辑资料</a>
							<a href="../index/exit.php">退出账号</a>
						</div>
					</div>
				</div>



			</div>
			<!-- </div> -->
			</div>
		</header>
		<?php 
			if(isset($_SESSION['username'])){
				echo "<script>
					$('.reg,.login').addClass('hide');
		        	$('.my').removeClass('hide');
		        	//console.log(data);
		        	//console.log(data[0].username);
		        	//$('.user_panel a').eq(0).html(data[0].username);
		        	$('#mask').css('display','none');
					$('#login_reg').css({'opacity':0,'top':'-100px'});
					$('#login_reg').css('display','none');
					$('#login_reg').removeClass('css_active1 css_active');
				</script>";
			}

		 ?>
		