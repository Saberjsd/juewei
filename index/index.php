<?php
 isset($_SESSION) || session_start();
	require './page.php';
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>首页</title>
		<!-- <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="css_index1/header.css" type="text/css" />
		<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="js_index1/index.js"></script>
		<script src="js_index1/aj.js"></script>

	</head>

	<body>
		<header id="header">
			<div class="content">
				<div class="nav">
					<div id='logo'><a href="./index.php"></a></div>
					<ul id='nav-list'>
						<li>
							<a href="../article/article.php" target="_blank">文章</a>
						</li>
						<li>
							<a href="../image/imagelist.php" target="_blank">美图</a>
						</li>
						<li>
							<a href="../about/juewei.php" target="_blank">关于</a>
						</li>
						<li>
							<a href="../about/liuyan.php" target="_blank">留言</a>
						</li>
					</ul>
					<div id='search'>
						<form method='get' action=''>
							<span class='search-icon sicon1'><img src="img_index/search.png"/></span>
							<span class='input'>
							<div class="search-input-wrapper">
								<span class='search-icon'><img src="img_index/search.png"/></span>
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
					<div class="user_admin">我的<img id="myphoto" src="" alt="" /></div>
					<div class="user_img"><img src="" alt="" width='30' height='30'/></div>
						<div class="user_panel">
							<a href="../person/perarticle.php"  target="_blank"><?=isset($_SESSION['username'])? $_SESSION['username'] :'' ?></a>
							<a href="../article/up_article.php"  target="_blank">发布文章</a>
							<a href="../image/up_image.php"  target="_blank">上传美图</a>
							<a href="../person/updateinfo.php"  target="_blank">编辑资料</a>
							<a href="./exit.php">退出账号</a>
						</div>
					</div>
				</div>

			</div>
			</div>
			</div>
		</header>
		<div id="billboard">
			<div class="wrapper">
				<div class="inner">
					<h1 style='font-size:20px;margin-botton:10px'>热爱生活     享受乐趣</h1>
					<p>Love life and enjoy the fun.</p>
				</div>
			</div>
		</div>
		<div id="container">
			<div class="slider">
				<div class="slider-main">
					<div class="slider-img">
						<a href="#"><img src="img_index/08112152c48359f4f2515ed.jpg" alt="" /></a>
					</div>
					<div class="slider-img">
						<a href="#"><img src="img_index/12215358876b9b48232955f.jpg" alt="" /></a>
					</div>
					<div class="slider-img">
						<a href="#"><img src="img_index/20235402b31dda0947d4c4f.png" alt="" /></a>
					</div>
					<div class="slider-img">
						<a href="#"><img src="img_index/22143930d336eee5d32eabd.jpg" alt="" /></a>
					</div>
					<div class="slider-img">
						<a href="#"><img src="img_index/24202947916729fe814a80d.png" alt="" /></a>
					</div>
				</div>

				<div class="slider-control">
					<span class="slider-prev"><img src="img_index/左.png" alt="" /></span>
					<span class="slider-next"><img src="img_index/右.png"/></span>
				</div>
			</div>
			<div class="ad">
				<div class="ad1"></div>
				<div class="ad2"></div>
			</div>
		</div>

		<div id="cool">
			<div class="cool-content">
				<ul>
					<?php 
						foreach ($data as $k=>$v){
							$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
							preg_match_all($pattern,$v['content'],$match); 
							// var_dump($match);
							// var_dump($v['content']);
							echo '<li>
						<div class="item">
							<div class="extra">
								<a href="" rel="category tag">'.$ca[$v['cateid']].'</a><span>'.$v['views'].'</span><img src="img_index/pen.png" alt="" /></div>
							<div class="thumb">
								<div class="thumb_mask"></div>
								<a href=""><img src="'.$match['1']['0'].'" alt="" /></a>
							</div>
							<div class="meta">
								<a href="">'.$v['title'].'</a>
							</div>
							<div class="data"><time class="time">
          2017-04-08         </time>
								<span class="comment-num"><a href=""><img src="img_index/comment.png" alt="" />'.$v['comments'].'</a></span>
								<span class="heart-num"><a href=""><img src="img_index/heart.png" alt="" />'.$v['likes'].'</a></span>
							</div>
						</div>
					</li>';}
						
						?>
				</ul>
			</div>
			<div id="pagination">
				 <a href="./index.php?page=1"class="pagenumbers textalign "><<</a>
                <a href="./index.php?page=<?=(($page-1) <= 0 ? 1 :($page-1));?>"class="pagenumbers textalign "><</a>
				<?php
					   $totalshow  = 5;
                    //计算开始页数
                    $start      = $page - ($totalshow-1)/2;
                    //开始页数不能小于1
                    if($start < 1) $start = 1;
                    //结束页数用  公式：$end - $start = $totalshow-1 计算出来
                    $end        = $start + $totalshow - 1;
                    //结束页数不能大于总页数
                    if($end > $totalpage){
                        $end    = $totalpage;
                        //开始页数失效，重新计算
                        $start  = $totalpage-$totalshow + 1;
                        //还是要保证开始页数不能小于1
                        if($start < 1) $start = 1;
                    }
                    for ($i=$start; $i <= $end; $i++){
                        if($i == $page){
                            echo '<a class="pagenumbers page_current textalign">'.$i.'</a>';
                        }else{
                            echo '<a href="./index.php?page='.$i.'" class="pagenumbers textalign">'.$i.'</a>';
                        }
                    }
					?>
					 <a href="./index.php?page=<?=(($page+1) > $totalpage ? $totalpage : ($page+1));?>"class="pagenumbers textalign ">></a>
                <a href="./index.php?page=<?=$totalpage;?>"class="pagenumbers textalign ">>></a>
                </div>
			</div>
		</div>

		<div id="love">
			<div class="content">
				<ul>
					<?php
						foreach ($pic as $k=>$v){
							$match=explode(',', $v['content']);
						
						echo '<li>
						<a href=""><img src="'.$match['1'].'" alt="" />
							<div class="lock"><img src="img_index/锁链.png" alt="" />
							</div>
						</a>
						<div class="picmeta">
							<div class="title">
								<a href="">'.$v['title'].'</a>
							</div>
							<div class="extra">
								<time class="time">
                      					2017-03-24                      </time>
								<span class="comment-num"><img src="img_index/comment (1).png" alt="" />'.$v['comments'].'</span>
								<span class="view-num"><img src="img_index/eye.png" alt="" />'.$v['views'].'</span>
								<span class="heart-num"><img src="img_index/heart (1).png" alt="" />'.$v['likes'].'</span>
							</div>
						</div>
						<div class="mask"></div>

					</li>';}
						?>
				</ul>
			</div>
		</div>
		<div id="user">
			<ul>
				<li>
					<div><img src="img_index/find.png" alt="" /></div>
					<!-- <i class="fa fa-search"></i> -->
					<h2>探索发现</h2>
					<h3>探索创造性的思维，发现引领最新的设计潮流</h3>
				</li>
				<li>
					<div><img src="img_index/user.png" alt="" /></div>
					<h2>用户设计</h2>
					<h3>以用户为中心，以体验为至上，以细节为成败</h3>
				</li>

				<li>
					<div><img src="img_index/pass.png" alt="" /></div>
					<h2>情感传递</h2>
					<h3>不只是图文信息，更多的是喜怒哀乐的情感</h3>
				</li>
			</ul>
		</div>
		<footer>
			<div class="footer_content">
				<div class="refer">
					<aside id="describe" class="group">
						<h3>觉唯</h3>
						<p class="describe-text">以用户为中心的设计理念，专注于用户体验设计，拥有国内外最新的设计潮流趋势、独特而美的创意视觉、新颖而灵敏的思维意识、极致而生动的交互体验，更有严谨而通俗的技术教程！</p>
						<p>唯然是觉唯网的图片分享社区，以记录美丽、分享美好的创意理念，分享高品质创意、艺术、设计、时尚、插画、摄影、唯美类精美图片。</p>
						<p class="stamp"></p>
					</aside>
					<aside class="group">
						<h3 class="title">关于</h3>
						<div class="menu-about-container">
							<ul id="menu-about" class="menu">
								<li>
									<a href="http://www.jiawin.com/about-us">关于觉唯</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/contact-us">留言联系</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/links">友情链接</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/copyright">免责声明</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/sitemap">网站地图</a>
								</li>
							</ul>
						</div>
					</aside>
					<aside class="group">
						<h3 class="title">栏目</h3>
						<div class="menu-category-container">
							<ul id="menu-category" class="menu">
								<li>
									<a href="http://www.jiawin.com/topics/ued">用户体验</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/topics/resource">素材下载</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/topics/cool">设计欣赏</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/store">主题商店</a>
								</li>
								<li>
									<a href="http://www.jiawin.com/weiran">唯然灵感</a>
								</li>
							</ul>
						</div>
					</aside>
					<aside class="group">
						<h3 class="title">友链</h3>
						<div class="menu-links-container">
							<ul id="menu-links" class="menu">
								<li>
									<a target="_blank" href="http://www.qianduan.net/">前端观察</a>
								</li>
								<li>
									<a target="_blank" href="http://www.shejidaren.com/">设计达人</a>
								</li>
								<li>
									<a target="_blank" href="http://vip.qq.com/huafei.html">手机话费开通会员</a>
								</li>
							</ul>
						</div>
					</aside>

					<aside id="social" class="group">
						<h3 class="title">关注</h3>

						<ul>
							<li>Email:
								<a href="">javin@jiawin.com</a>
							</li>
							<li class="social-email">
								<form action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank" method="post">
									<input type="hidden" name="t" value="qf_booked_feedback">
									<input type="hidden" name="id" value="">
									<div class="social-email">
										<input class="email" id="to" name="to" type="email" placeholder="请输入您的邮箱" required="">
										<input class="submit" type="submit" value="订阅">
									</div>
								</form>
							</li>
						</ul>
					</aside>

				</div>

				<div class="copyright">
					<p class="copyright">Copyright © 2012-2018
						<a href="http://www.jiawin.com">觉唯设计</a> Theme by
						<a rel="author" href="http://www.jiawin.com/user/1">Javin zhong</a> All All Rights Reserved. 粤ICP备12073831号-1</p>
				</div>
			</div>
		</footer>

		<div id="mask">

		</div>

		<div id="login_reg">
			<!--<div class="stage">-->

			<form id="login">
				<div id="register-active"><img src="img_index/开关3.png" alt="" />切换注册</div>
				<h3>登录</h3>
				<p>
					<label class="icon" for="username"></label>
					<input class="input-control" id="username" type="text" placeholder="请输入用户名" name="username" required="" aria-required="true">
					<span></span>
				</p>

				<p>
					<label class="icon" for="password"></label>
					<input class="input-control" id="password" type="password" placeholder="请输入密码" name="passwd" required="" aria-required="true">
					<span></span>
				</p>

				<p class="safe">
					<label class="remembermetext" for="rememberme"><input name="rememberme" type="checkbox" checked="checked" id="rememberme" class="rememberme" value="forever">记住我的登录</label>
					<a class="lost" href="http://www.jiawin.com/wp-login.php?action=lostpassword">忘记密码？</a>
				</p>

				<p>
					<input class="submit" type="button" id='loginbtn'value="登录" name="submit">
				</p>
				<a class="close"></a>
			</form>

			<form id="reg">
				<div id="login-active"><img src="img_index/开关4.png" alt="" />切换登录</div>
				<h3>注册</h3>
				<p>
					<label class="icon" for="user_name"></label>
					<input class="input-control" id="user_name" type="text" placeholder="请输入用户名" name="username" required="" aria-required="true">
					<span></span>
				</p>
				<p>
					<label class="icon" for="password"></label>
					<input class="input-control" id="pass_word" type="password" placeholder="请输入密码" name="passwd" required="" aria-required="true">
					<span></span>
				</p>
				<p>
					<label class="icon" for="repass_word"></label>
					<input class="input-control" id="repass_word" type="password" placeholder="再次输入密码"  required="" aria-required="true">
					<span></span>
				</p>
				<p>
					<input class="submit" type="button" id="regbtn" value="注册" name="submit">
				</p>
				<div class="other-sign">
					<p>您也可以使用第三方帐号快捷注册</p>
					<div>
						<a rel="nofollow" class="qqlogin" href="http://www.jiawin.com/oauth/qq"><i class="fa fa-qq"></i>QQ一键注册</a>
					</div>
				</div>
			</form>
				
			<!--</div>-->
		</div>
	</body>

</html>
		<?php 
		var_dump($_SESSION);
			if(isset($_SESSION['username'])){
				// echo '<hr>';
				echo "<script>
					$('.reg,.login').addClass('hide');
		        	$('.my').removeClass('hide');
		        	//$('.user_panel a').eq(0).html(data[0].username);
		        	$('#mask').css('display','none');
					$('#login_reg').css({'opacity':0,'top':'-100px'});
					$('#login_reg').css('display','none');
					$('#login_reg').removeClass('css_active1 css_active');
				</script>";
			}

		 ?>