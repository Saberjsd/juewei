$(function(){
	$('.search-icon').click(function(){
//		$(this).css('background','white')
		$('.sicon1').css('display','none');
		$('.search-input-wrapper').animate({'width':'222px','opacity':1},1000,'linear');
		$('.input').animate({'width':'180px'},1000,'linear');
		$('.search-input').animate({'width':'180px'},1000,'linear');
	})
	$('#header').click(function(){
		
	
		$('.search-input-wrapper').animate({'width':0,'opacity':0},1000,'linear');
		$('.input').animate({'width':0},1000,'linear');
		$('.search-input').animate({'width':0},1000,'linear',function(){
				$('.sicon1').css('display','block');
		});
	})
	$('#header').children().each(function(){
		 
		 $(this).click(function(){
		 	event.stopPropagation();//阻止事件冒泡即可
		 })
	})
	
	
	var z=0;
	$('.login').click(function(){
		flag=0;
		$('#reg').removeClass('rotatey_0').addClass('rotatey_180');
		$('#login').removeClass('rotatey_180').addClass('rotatey_0');
		$('#mask').css('display','block');
		$('#login_reg').css('display','block')
		$('#login_reg').animate({'opacity':1,'top':'100px'},'fast','linear');
		
	})
	$('#mask').click(function(){
		$(this).css('display','none');
		$('#login_reg').css({'opacity':0,'top':'-100px'});
		$('#login_reg').css('display','none');
		$('#login_reg').removeClass('css_active1 css_active');
	})
	$('#register-active').click(function(){
		if(z==0){
			$('#login_reg').removeClass('css_active1').addClass('css_active');
			return;
		}
		$('#login_reg').removeClass('css_active').addClass('css_active1');	
		
	})
	$('#login-active').click(function(){

			if(z==0){
				$('#login_reg').removeClass('css_active').addClass('css_active1');
				return;
			}
			$('#login_reg').removeClass('css_active1').addClass('css_active');
	})
	
	
	$('.reg').click(function(){
		z=1;
		$('#reg').removeClass('rotatey_180').addClass('rotatey_0');
		$('#login').removeClass('rotatey_0').addClass('rotatey_180');
		$('#mask').css('display','block');
		$('#login_reg').css('display','block');
		$('#login_reg').animate({'opacity':1,'top':'100px'},'fast','linear');
	})
	
	

	$('.user').on({
		mouseover:function(){
			$('.user_panel').css('display','block');
		},
		mouseout:function(){
			$('.user_panel').css('display','none');
		}
	})
})
