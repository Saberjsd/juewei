<?php
	 
	require '../common/index_common.php';
	$pa = $mydb->getOneData('user','uid,photo,usersign,tel,email','username ="'.$_SESSION['username'].'"');

	if(isset($_POST['tel'])){
		$data = $_POST;
		unset($data['editorValue']);
		// var_dump($data);
		$res = $mydb->updateData('user',$data,'username="'.$_SESSION['username'].'"');
		if($res){
			echo json_encode(array('res' => 'ok'));
			// header('Location:./');
		}else{
			echo json_encode(array('res' => 'fail'));
		}
		exit;
	}
	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人资料修改</title>
	<style>
		body{
			background: #f1f1f1 !important;
			position: relative;
		}
		*{ list-style: none;}
		#upload_img_wrap{ margin-top: 10px !important;}
		.content11{
			width: 1260px;
			padding-bottom: 100px;
			margin: 0px auto;
			margin-bottom: 100px;
			border: 1px solid #fff;
			padding-top: 100px;
			background: white;
		}
		.wrap{

			width: 90%;
			margin: 0 auto;
			
		}
	</style>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../index/head.css">
	<link rel="stylesheet" href="../index/foot.css">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="../index/js_index/aj.js"></script>
	<script src="../index/js_index/head.js"></script>
	<!-- <script src="../index/js_index/index.js"></script> -->
</head>
<body>
	<?php 
		require '../index/head.php'; 
	 ?>
	<div class="content11">
		<div class="wrap">

		<!-- <div class="container"> -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>个人资料修改</h3>
					
				</div>
				<div class="panel-body">


					<form id="updateform" >
					  <div class="form-group">
					    <h4><label for="tel">电话</label></h4> 
					    <input type="text" class="form-control" name="tel" id="tel"  value="<?=$pa['tel']?>" placeholder="电话...">
					    <span class="help-block"><br></span>
					  </div>

					  <div class="form-group">
					    <h4><label for="email">邮箱</label></h4> 
					    <input type="text" class="form-control" name="email" id="email" value="<?=$pa['email']?>"  placeholder="邮箱...">
					    <span class="help-block"><br></span>
					  </div>

					  <div class="form-group">
					    <h4><label for="usersign">个性签名</label></h4> 
					    <input type="text" class="form-control" name="usersign" id="usersign" value="<?=$pa['usersign']?>"  placeholder="个性签名...">
					    <span class="help-block"><br></span>
					  </div>


        			<!-- 加载编辑器的容器 -->
			        <div class="form-group ">
			        	<h4><label>头像</label></h4> 
				        <button type="button" id="j_upload_img_btn" class="btn btn-info">选头像</button>
				        <ul id="upload_img_wrap"></ul>

				        <!-- 传图片地址值用的 -->
				        <input type="hidden" id="imgval" name="photo" value="">

					    <!-- 加载编辑器的容器：用来上传单张图片的，必须要，不然上传的图片会追加到上面的编辑器里面 -->
					    <textarea id="uploadEditor" style="display: none;"><?=$pa['photo']?></textarea>
					</div>

					  
					  <div class="row">
					  	<div class="col-md-2">
					  		<button type="button" class="btn btn-success" id="update">提交</button>
					  	</div>
					  </div>


					</form>
				</div>
			</div>
		<!-- </div> -->

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
	$('#update').click(function(event) {
		
		$.ajax({
			url: './updateinfo.php',
			type: 'POST',
			dataType: 'JSON',
			data: $('#updateform').serialize(),
		})
		.done(function(data) {
			console.log(data);
			if(data.res == 'ok'){
				alert('成功')
			}else{
				alert('失败')
			}
		})
		
	});
</script>

