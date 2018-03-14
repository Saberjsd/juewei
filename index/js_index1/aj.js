$(function(){
	$('#user_name').focus(function(){
	if($.trim($('#pass_word').val())!=''){
			$('#pass_word').next('span').html('');
			return;			
		}
});
$('#user_name').blur(function(){
	if($.trim($('#user_name').val())==''){
			$('#user_name').next('span').html('账户不能为空');
			return;			
		}
})
$('#pass_word').focus(function(){
	if($.trim($('#user_name').val())!=''){
			$('#user_name').next('span').html('');
			return;			
		}
})
$('#repass_word').focus(function(){
	if($.trim($('#pass_word').val())!=''){
			$('#pass_word').next('span').html('');
			return;			
		}
	if($.trim($('#user_name').val())!=''){
		$('#user_name').next('span').html('');
		return;			
	}
})
$('#pass_word').blur(function(){
	
	if($.trim($('#pass_word').val())==''){
			$('#pass_word').next('span').html('密码不能为空')
			return;
		}
})

$('#regbtn').click(function(event){
		if($('#pass_word').val()!=$('#repass_word').val()){
			$('#repass_word').next('span').html('输入不一致');
			return;
		}
		$.ajax({
			url:'./reg.php',
			type:'POST',
			dataType:'json',
			data:$('#reg').serialize()
		})
		.done(function(result){
			console.log(result);
				if(result.reg=='ufailure'){
					$('#user_name').next('span').html('该账户已存在，请重新输入');
					$('#user_name').focus();
					console.log(1)
				}
				if(result.reg=='pfailure'){
					$('#pass_word').next('span').html('密码输入有误，请重新输入')
					$('#pass_word').focus();
					console.log(2)
				}
				
				if(result.reg=='success'){
					alert('恭喜你成为我们的一员')
				}
		})		
	})


$('#username').focus(function(){
				if($.trim($('#password').val())!=''){
						$('#password').next('span').html('');
						return;			
					}
			});
		$('#username').blur(function(){
			if($.trim($('#username').val())==''){
					$('#username').next('span').html('账户不能为空');
					return;			
				}
		})
		$('#password').focus(function(){
			if($.trim($('#username').val())!=''){
					$('#username').next('span').html('');
					return;			
				}
		});
		$('#password').blur(function(){
			if($.trim($('#password').val())==''){
					$('#password').next('span').html('密码不能为空');
					return;			
				}
		})
		$('#loginbtn').click(function(){
			 $.ajax({
                url: './login.php',
                type: 'POST',
                dataType: 'JSON',
                data: $('#login').serialize()
            })
            .done(function(data){
            	if(data.r1=='username_invail'){
            		alert('不存在此用户名');
            		return;
            	}
            	if(data.r1=='passwd_invail'){
            		alert('密码输入有误');
            		return;
            	}
            	$('.reg,.login').addClass('hide');
            	$('.my').removeClass('hide');
            	console.log(data);
            	console.log(data[0].photo);
            	$('.user_panel a').eq(0).html(data[0].username);
            	$('.user_img').css('background','url('+data[0].photo+')')
            	$('#mask').css('display','none');
				$('#login_reg').css({'opacity':0,'top':'-100px'});
				$('#login_reg').css('display','none');
				$('#login_reg').removeClass('css_active1 css_active');
            })
		})
		
		
		
})
