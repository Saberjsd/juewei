<?php 
    //添加文章
    if(isset($_POST['title'])){
        require '../common/index_common.php'; 
        $data = $_POST;
        // unset($data['fid']);
        date_default_timezone_set('Asia/Chongqing');
        $data['addtime'] = date('Y-m-d H-i-s');
        $data['author'] = $_SESSION['username'];
        // var_dump($data);
        $r = $mydb->insertData('article', $data);
        if($r === false){
            echo json_encode(array('r'=>'fail'));
        }else{
            echo json_encode(array('r'=>'success'));
        }
        exit;
    }

    require '../common/index_common.php';
    $cates = $mydb->getData('cate', 'cid,catename','pid=1','cid ASC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发布文章</title>
	<link rel="stylesheet" href="./css_article/up_article.css">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="../index/head.css">
	<link rel="stylesheet" href="../index/foot.css">

	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="./js_article/up_article.js"></script>
	<script src="../index/js_index/aj.js"></script>
	<script src="../index/js_index/head.js"></script>
</head>
<body>
	<?php 
		require '../index/head.php'; 
	 ?>
	<div class="content11">
		<div class="wrap">

		<div class="container">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>发布文章</h3>
					
				</div>
				<div class="panel-body">
					<form id="addform">
					  <div class="form-group">
					    <h4><label for="title">标题</label></h4> 
					    <input type="text" class="form-control" name="title" id="title" placeholder="title">
					    <span class="help-block"><br></span>
					  </div>
					  
					  <div class="row">
						<div class="col-md-3">
							<div class="form-group ">
							  	<h4><label for="">分类</label></h4> 
							    <select class="form-control" name="cateid">
							    	<?php  
							    		foreach ($cates as $k1 => $v1) {
							    			echo '<option value="'.$v1['cid'].'">'.$v1['catename'].'</option>';
							    		}
							    	?>
							    </select>
						  	</div>
					 	</div>
						<div class="col-md-9"></div>
					  </div>

					  <div class="form-group">
					  	<h4><label for="content">内容</label></h4>
					    <script id="content" name="content" type="text/plain" style="width:100%;height:200px"></script>
					  </div>
					  
					  <div class="row">
					  	<div class="col-md-2">
					  		<button type="button" class="btn btn-success" id="addarticle">发布文章</button>
					  	</div>
					  </div>
					</form>
				</div>
			</div>
		</div>

		</div>
	</div>

<?php 
    require '../index/foot.php';
?>
</body>
</html>
  <!-- 编辑器使用的==配置文件 start-->
    <script type="text/javascript" src="public/plug/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="public/plug/ue/ueditor.all.js"></script>
    <!-- 编辑器使用的==配置文件 end-->
    <script type="text/javascript">
    var ue = UE.getEditor('content');
    </script>