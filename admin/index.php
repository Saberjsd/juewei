<?php 
	$lgpage = 'index.php'; 
	require './header.php';

	$sql 	= 'show master status;';
	$r 		= $mydb->dblink->query($sql);
	$ba 	= $r->fetch_array(MYSQLI_ASSOC);
	// var_dump($ba['File']);

	$sql 	= "show binlog events in '".$ba['File']."';";
	$r 		= $mydb->dblink->query($sql);
	$la 	= $r->fetch_all(MYSQLI_ASSOC);
	// var_dump($la);
	foreach ($la as $ka => $va) {
		if($va['Event_type'] == 'Query' && $va['Info'] != 'BEGIN'){
			// echo $va['Info'];
			$loga = preg_split("/use\s+`jw`;\s+/",$va['Info']);
			// var_dump($loga);
		}
	}

	
?>
		<div class="main sidebar-minified">

			<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text"></i>首页</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">首页</a></li>			  	
										
					</ol>
				</div>
			</div>



			<div class="row">	
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-table red"></i><span class="break"></span><strong>数据库删改日志</strong></h2>
							<div class="panel-actions">
								<a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<table class="table table-bordered table-striped table-condensed table-hover">
								  <thead>
									  <tr>
										 <th>ID</th>
										 <th>日志内容</th>                                
									  </tr>
								  </thead>   
								  <tbody>
								<?php
									$loga 	= array();  
									foreach ($la as $ka => $va) {
										if($va['Event_type'] == 'Query' && $va['Info'] != 'BEGIN'){
											// echo $va['Info'];
											$logs 	= preg_split("/use\s+`jw`;\s+/",$va['Info'])['1'];
											// var_dump($logs);
											$loga[] = $logs;
											
										}
									}

									//每页显示多少
									$pagenum    = 3;
								    //获取当前页数
								    $page       = isset($_GET['page']) ? $_GET['page']: 1;
								    //获取总页数
								    $totalnum 	= count($loga);
								    $totalpage = ceil($totalnum/$pagenum);
								    if($totalnum - $page*$pagenum < 0){
								    	$limit = 0;
								    }else{
								    	$limit 	= $totalnum - $page*$pagenum;
								    }
								    
								    $page>=$totalpage ? $page : $page++;
									
									for($i = count($loga)-1; $i>=$limit; $i--){
										echo "<tr>
												<td>{$i}</td>
		                                        <td>{$loga[$i]}</td>
											</tr>";
									}
									
								?>

									
																                                   
								  </tbody>
							 </table>  
							 <ul class="pagination">
								<!-- <li><a href="index.php">上一页</a></li> -->
								
								<?php
									// for($i=1; $i<=$totalpage; $i++) {
										
									// }
									// $pi = 1;  
									// echo '<li><a href="index.php?page='.$i.'">加载更多</a></li>';
								?>
								<li><a href="index.php?page=<?=$page?>">点击加载更多</a></li>
							  </ul>     
						</div>
					</div>
				</div><!--/col-->
			</div><!--/row-->

<?php
/*
	$myini 		= file_get_contents('D:\phpStudy\PHPTutorial\MySQL\my.ini');
	$myini 		= mb_convert_case($myini, MB_CASE_LOWER,'utf-8');
	// var_dump(preg_split("/log-bin/", $myini)) ;
	$str1  		= preg_split("/log-bin/", $myini)['1'];
	// var_dump($str1);
	// echo '<hr>';
	$logindex  	= preg_split("/\s+/",$str1)['2'];
	// var_dump($logname);
	$str2		= file_get_contents("D:\phpStudy\PHPTutorial\MySQL\data\\".$logindex.'.index');
	// var_dump($str2);
	$logname	= array_slice(preg_split("/\s+/",$str2), -2, 1)['0'];
	$logname	= substr($logname, 2);
	// var_dump($logname);
	$str   		= file_get_contents('D:/phpStudy/PHPTutorial/MySQL/data/'.$logname);



	$str 		= mb_convert_case($str, MB_CASE_LOWER,'gbk');
	echo $str;
	
	// file_put_contents(filename, data)
	*/


?>

<?php 
	require './footer.php' ;
?>	