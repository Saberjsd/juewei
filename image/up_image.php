<?php 
    //添加图片
    if(isset($_POST['title'])){
        require '../common/index_common.php'; 
        $data = $_POST;
        // unset($data['fid']);
        date_default_timezone_set('Asia/Chongqing');
        $data['addtime'] = date('Y-m-d H-i-s');
        $data['author'] = $_SESSION['username'];
        $r = $mydb->insertData('image', $data);
        if($r === false){
            echo json_encode(array('r'=>'fail'));
        }else{
            echo json_encode(array('r'=>'success'));
        }
        exit;
    }

    require '../common/index_common.php';
    $cates = $mydb->getData('cate', 'cid,catename','pid=2','cid ASC');

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>发布图片</title>
	<style>
		body{
			background: #f1f1f1 !important;
		}
		.content11{
			margin-top: 100px;
			width: 1260px;
            padding-top: 100px;
			padding-bottom: 100px;
			margin: 0 auto;
			background: white;
		}
		.wrap{

			width: 90%;
			margin: 0 auto;
			
		}
	</style>
	<!-- <link rel="stylesheet" href="../index/foot.css"> -->
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../index/head.css">
    <link rel="stylesheet" href="../index/foot.css">

	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
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
					<h3>发布图片</h3>
					
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


        			<!-- 加载编辑器的容器 -->
			        <div class="form-group ">
				        <button type="button" id="j_upload_img_btn" class="btn btn-info">选图片</button>
				        <ul id="upload_img_wrap"></ul>

				        <!-- 传图片地址值用的 -->
				        <input type="hidden" id="imgval" name="content" value="">

					    <!-- 加载编辑器的容器：用来上传单张图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
					    <textarea id="uploadEditor" style="display: none;"></textarea>
					</div>

					  
					  <div class="row">
					  	<div class="col-md-2">
					  		<button type="button" class="btn btn-success" id="addimage">提交</button>
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
      
        // 如何单独上传图片功能
        // 监听多图上传和上传附件组件的插入动作
        // 这里需要实例化一个新的编辑器，防止和上面的编辑器的内容冲突
        var uploadEditor = UE.getEditor("uploadEditor", {
            isShow: false,
            focus: false,
            enableAutoSave: false,
            autoSyncData: false,
            autoFloatEnabled:false,
            wordCount: false,
            sourceEditor: null,
            scaleEnabled:true,
            toolbars: [["insertimage", "attachment"]]
        });
        uploadEditor.ready(function () {
            uploadEditor.addListener("beforeInsertImage", _beforeInsertImage);
        });

        // 自定义按钮绑定触发多图上传和上传附件对话框事件
        document.getElementById('j_upload_img_btn').onclick = function () {
            var dialog = uploadEditor.getDialog("insertimage");
            dialog.title = '多图上传';
            dialog.render();
            dialog.open();
        };

        // 多图上传动作
        function _beforeInsertImage(t, result) {
            var imageHtml = '';
            var imgval = '';
            for(var i in result){
                imageHtml += '<li><img src="'+result[i].src+'" alt="'+result[i].alt+'" height="150"></li>';
                imgval    += ',' + result[i].src;
            }
            document.getElementById('upload_img_wrap').innerHTML = imageHtml;
            //如果需要保存图片地址到数据，还需要把所有的图片地址作为输入值
            //具体怎么设置看项目需求，我这里只是举个例子
            document.getElementById('imgval').value = imgval;
        }

    </script>

<script>
$(function(){
    $('#addimage').click(function(event) {
        var $title  = $('#title').val();
        if(!$title){
            $('#title').next('span').html('标题不能为空!')
            $('#title').focus();
            return ;
        }

        $.ajax({
            url: './up_image.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('#addform').serialize()
        })
        .done(function(data) {
            if(data.r == 'success'){
                // window.location.href = './article.php';
                alert('成功')
            }else{
                alert('添加失败，请刷新后重新操作！');
            }
        });
    });
})
</script>