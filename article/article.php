<?php
	require '../common/db_connect.php';
	$datas=$mydb->getData('article','*','status=1 order by artid DESC');

	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>文章</title>
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../index/head.css">
	<link rel="stylesheet" href="../index/foot.css">
	    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="css_article/article.css"/>
	    <script src="js_article/article.js" type="text/javascript" charset="utf-8"></script>
	    <script src="../index/js_index/aj.js"></script>
	<script src="../index/js_index/head.js"></script>
	</head>
	<body>
	<?php 
		require '../index/head.php'; 
	 ?>
	<form action="area_article.php" id="article" method="get">
		<div class="container">
			<div class="guide" id="guide">
				<div class="group" id="group">
					<ul>
						<li class="colum">
							<a href="#" class="current"><i class="fa1"><img src="ico/bookmark.png "/></i> &nbsp;不限类别&nbsp; </a>
							<i class="fa1 fa_up"><img src="ico/pull-bottom.png "/></i>
							<ul class="sub">
								<li><a href="">前端开发</a></li>
								<li><a href="">视觉设计</a></li>
								<li><a href="">用户研究</a></li>
								<li><a href="">交护设计</a></li>
							</ul>
						</li>
						<li class="sort">
							<a href="#" class="current"><i class="fa1"><img src="ico/pull-top-bottom.png "/></i></i> &nbsp;最新发布 &nbsp; </a><i class="fa1 fa_up"><img src="ico/pull-bottom.png "/></i>
							<ul class="sub">
								<li><a href="">喜欢最多</a></li>
								<li><a href="">浏览最大</a></li>
								<li><a href="">评论最多</a></li>
							</ul>	
						</li>
						<li class="timeframe">
							<a href="#" class="current"><i class="fa1"><img src="ico/time.png "/></i></i>  &nbsp;不限时间 &nbsp; </a><i class="fa1 fa_up"><img src="ico/pull-bottom.png "/></i>
							<ul class="sub">
								<li><a href="">一周内</a></li>
								<li><a href="">一月内</a></li>
								<li><a href="">一年内</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		  
			<div class="primary list" id="primary">
				<?php
						$cate=array ("1"=>"前端开发","2"=>"视觉设计","3"=>"用户体验","4"=>"交互设计");
						foreach ($datas as $key => $value) {
							//过滤标签
							
							$str=strip_tags($value['content']);
							//$new1=strip_tags ($value['content']);  
							//截取从0开始50个字符
							$jianjie[]=mb_substr ($str,0,100,'utf-8');

							$pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/"; 
							preg_match_all($pattern,$value['content'],$match);
							// print_r($match) ;
							echo '
								
								<ul class="ul_group" id="ul_group">
									<li class="group" >
										<div class="item">	
											<div class="thump">
												<a href="#"><img class="img-title" src="'.$match[1][0].'" alt="学会二维小动画" /></a>
											</div>
											<div class="item-main">
													<div class="title">
														<h2><a href="area_article.php?artid='.$value['artid'].'"   target="_blank">'. $value['title'].'</a></h2>
													</div>
													<div class="meta">
														<div class="cat">
															<a href="#">'.$cate[$value['cateid']].'</a>
															<span class="tag-links">
																<i class="fa">
																	<a href="">二维</a>-
																	<a href="">动画</a>-
																	<a href="">教程</a>
																</i>
															</span>
														</div>	
														<div class="excerpt"> 
														 '.$jianjie[0].'...
														        
													</div>
													<div class="data">
														<time class="time">
															<i class="fa"><img src="ico/稿件-作者.png"/></i>
															作者设计分享  发布于  '.$value['addtime'].'
														</time>
														<div class="data-r">
														<span class="heart-num">
															<i class="fa"><img src="ico/点赞 (1).png"/></i>'.$value['likes'].'
														</span >
														<span class="views-num">
															<i class="fa"><img src="ico/浏览 (1).png"/></i>'.$value['views'].'
														</span>
														<span class="comment-num">
															<a href="#"><i class="fa"><img src="ico/评论 (1).png"/></i>'.$value['comments'].'</a>
														</span>
														</div>
													</div>
													<div class="author">
														<a href="#">
															<img class="author_pic" src="img_article/article_log01.jpg"/>
														</a>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							';
						}
					?>

				
			</div>			
		</div>
		
		
		<div aria-label="Page navigation" id='pading'>
			<ol class="pagination pading">
				<li>
                  <a href="index.php?page=<?=(($page-1)>1?($page-1):1);?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
                  <a href="index.php?page=<?=(($page+1))>$totalpage ? $totalpage:($page+1);?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
			</ol>
			
		</div>
	</form>
	<?php 
	require '../index/foot.php';
?>	
	</body>
</html>
