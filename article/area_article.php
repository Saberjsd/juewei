<?php
	require '../common/index_common.php';
	$artid=$_GET['artid'];
	if(!isset($artid)){
		exit;
	}
	$data=$mydb->getOneData('article','*','artid='.$artid.' and status=1');
	$result1=$mydb->getData('artcomment','content,addtime','artid='.$artid.' and status=1');
	$commentno=$mydb->getData('artcomment','count(artid) as commentno','artid='.$artid.' and status=1');
	// var_dump($commentno);
	foreach ($data as $key => $value) {
		$$key=$value;
	}
	$result=$mydb->getData('article','title',1);
	//浏览量
	
	//获取title
	$contents=array();
	foreach ($result as $key => $value) {
		$contents[]=$value['title'];
	}

	

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="css_article/area_article.css"/>
	    <script src="js_article/area_article.js" type="text/javascript" charset="utf-8"></script>
		 
	</head>
	<body>
		
		<input type="hidden" name="artid" id="artid" value="<?=$artid;?>">
			<div class="primary">
				<form action="" id="area" method="get">

					<div class="area">
						<article id='acticle_01'>
							<header class="single-header">
								<div class="single-meta">
									<div class="author-avatar">
										<a href="#" >
											<img class="author_pic" src="img_article/article_log01.jpg" alt="作者头像" />
										</a>
									</div>
									
									<!-- <h1 class="title">学会二维小动画，只需十分钟！</h1> -->
									<h1 class="title">
										<?php
											echo "$title";
										?>
									</h1>

									
									<p class="info"> 
										<span class="cat-links">
											分类栏目:<a href="#">用户体验</a>-
											<a href="#">交互设计</a>
										</span>
									</p>
									<p class="copyright">
										<span>版权信息:</span>
										<a href="#"><?php echo $author; ?>设计分享</a>
										原创作品、版权所有，禁止转载，分享请注明版权。
									</p>
								</div>
								<div class="data-meta">
									<p class="badge-num"><?php echo $views; ?></p>
									<p>
										<span class="author">
											<a href="#"><?php echo $author; ?>设计分享</a>
											<time class="data-time">
												<?php 
													echo $addtime;
												?>

											<!-- 2017-01-28 -->
											</time>
										</span>
										<span class="comments-link">
											<a href="#"><?php echo $comments;?> 条评论</a>
										</span>
									</p>
								</div>
							</header>
							<div class="single-content-wrapper">
		
								<div class="single-content">
									<?php 
										echo $content;
									?>
								</div>
							</div>
						
							<footer class="single-footer">
								<div class="single-heart">
									<a href="javascript:void(0);" class="user-signin" id="user-signin">
										<i class="fa"><img src="ico/heart.png"/></i>
										<span class="heart-text">喜欢</span>(<span class="heart-no">
										<?php
											echo $likes;
										?>
										</span>)
									</a>	
									<div class="loading-line"></div>	
								</div>
								<div class="tag-share">
									<div class="tag-links">
										<span>
											<i class="fa"><img src="ico/bookmark-top.png"/></i>标签
										</span>
										<a href="#">二维</a>
										<a href="#">动画</a>
										<a href="#">教程</a>
									</div>
									<div class="share">
										<a href="#"><i class="fa"><img src="ico/xinlang1.png"/></i></a>
										<a href="#"><i class="fa"><img src="ico/tengxun.png"/></i></a>
										<a href="#"><i class="fa"><img src="ico/kongjian.png"/></i></a>
										<a href="#"><i class="fa"><img src="ico/weixin.png"/></i></a>
									</div>
								</div>
								<nav class="navigation post-navigation">
									<div class="nav-links">
										<a href="#" class="pre-post">
											<i class="fa"><img src="ico/pull-left.png"/></i>
											上一篇：
										</a>
										<a href="#" class="next-post">
											下一篇：
											<i class="fa"><img src="ico/next.png"/></i>
										</a>
									</div>
								</nav>
							</footer>
								
						</article>
						
					</div>
				</form>
				<div class="area">
					<div class="related-posts">
						<h2 class="title">相关推荐</h2>
					</div>
					<ul id="tuijian">
						<li>
							<div class="item">
								<div class="thump">
									<a href="#"><img src="img_article/thump_01.png"/></a>
								</div>
							</div>
							<a href="#" class="post-title hover">釜势设计分享第二十三期－矢量盆景</a>
						</li>
						<li>
							<div class="item">
								<div class="thump">
									<a href="#"><img src="img_article/thump_02.jpg"/></a>
								</div>
							</div>
							<a href="#" class="post-title hover">釜势设计分享第二十三期－矢量盆景</a>
						</li>
						<li>
							<div class="item">
								<div class="thump">
									<a href="#"><img src="img_article/thump_03.png"/></a>
								</div>
							</div>
							<a href="#" class="post-title hover">釜势设计分享第二十三期－矢量盆景</a>
						</li>
						<li>
							<div class="item">
								<div class="thump">
									<a href="#"><img src="img_article/thump04.png"/></a>
								</div>
							</div>
							<a href="#" class="post-title hover">釜势设计分享第二十三期－矢量盆景</a>
						</li>
					</ul>
				</div>
					
					<div class="area">
						<div class="comments">

							<div class="comment-respond" id="respond">
								<h3 id="reply-title"></h3>
									<p class="must-log-in">
										登录之后才能评论，请点击<a href="#">登录</a>。
									</p>
									<form action="./comment_area.php" method="post" id="comment_area">
									<input type="hidden" name="artid" value="<?=$artid;?>">
										<div class="comment-form-main">
											<div class="avatar">	
												<img src="ico/空间00.png" alt="">
											</div>
											<div class="comment-form-box">
												<textarea name="content" id="" cols="100%" rows="8" placeholder="说的什么吧..." style="outline: none;"></textarea>

											</div>
											<div comment-tip></div>
										</div>
										<p class="logged-in-as">hello
											<a href="" name="user"><?php echo '你好';?></a>！<a href="">退出</a>
										</p>
										<p class="form-submit">
											<input type="button" name="submit" class="submit" id="submit" value="发表评论">
										</p>

									</form>
							</div>
							<h2 class="comments-title">全部评论 /<strong><?php echo $commentno[0]['commentno'];?></strong></h2>
							<?php

								foreach ($result1 as $key => $value) {
									
										echo ' 
									<ol class="comment-list">
										<li class="">
											<div class="comment-body">
												<div class="comment-author vcard">
													<a href="#"><img src="ico/kongjian.png" alt=""></a>
												</div>
												<div class="comment-main">
													<p>'.$value['content'].'</p>
													<div>
														<span class="author">
															<cite>jsd</cite>
														</span>
														<span class="date">
															'.$value['addtime'].'
														</span>
														<span class="reply ">
															登陆以回复
														</span>
													</div>

												</div>
												<div class="comment-floor">1</div>
										
											</div>	
										</li>
									</ol>


								';
								}
							?>
							
							
							
						</div>
					</div>
				
			</div>
		
	</body>
</html>
