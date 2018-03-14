$(function(){
	//搜索框特效
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
		
	
	
	
	var imgs=$('.slider-main').children();
	for(var i=0;i<imgs.length;i++){
		$('.slider-control').children().last().before('<span class="slider-btn" id='+(i+1)+'></span>');
	}
	$('.slider-btn').eq(0).addClass('slider-current');
	var width=$('.slider').width();
	// console.log(width);
	var inow=0;
	$('.slider-control span').each(function(index){
		$(this).click(function(){
			 clearInterval(timer);
			if($(this).attr('class')=='slider-prev'){
				imgs.eq(inow).animate({left:width},'fast','linear');
				--inow<0?inow=imgs.length-1:inow; 
				imgs.eq(inow).css('left',-width+'px');
				imgs.eq(inow).animate({left:0},'fast','linear');
				setSquare();
				timer = setInterval(autoplay,3000);  // 开启定时器
			}
			else if($(this).attr('class')=='slider-next'){
				autoplay();
				 timer = setInterval(autoplay,3000);
			}
			else{
				var that=$(this).attr('id')-1;
				if(that>inow){
					imgs.eq(inow).animate({left:-width},'fast','linear');
					imgs.eq(that).css('left',width+'px');					
				}
				else if(that<inow){
					imgs.eq(inow).animate({left:width},'fast','linear');
					imgs.eq(that).css('left',-width+'px');		
				}
				inow=that;
			
				imgs.eq(inow).animate({left:0},'fast','linear');
				setSquare();
				 timer = setInterval(autoplay,3000);
        		
			}
		})
	})
	
	
	function setSquare(){
		$('.slider-control span').removeClass('slider-current');
		$('.slider-control span').eq(inow+1).addClass('slider-current');
	}
	var timer=null;
	timer=setInterval(autoplay,3000);
	function autoplay(){
		
		imgs.eq(inow).animate({left:-width},'fast','linear');
		++inow>imgs.length-1?inow=0:inow;
		imgs.eq(inow).css('left',width+'px');
		imgs.eq(inow).animate({left:0},'fast','linear');
		setSquare();
	}
	
	$('.slider').hover(function(){
//			 clearInterval(timer);
			 if(!$('.slider-prev').is(":animated")){
        		$('.slider-prev').animate({'left':0},500,'linear');
       		}
        	if(!$('.slider-next').is(":animated")){
        		$('.slider-next').animate({'right':0},500,'linear');
        	}
		},
		function(){
//			clearInterval(timer);  // 要执行定时器 先清除定时器
//      	timer = setInterval(autoplay,2000);  // 开启定时器
        	if(!$('.slider-prev').is(":animated")){
        		$('.slider-prev').animate({'left':'-40px'},500,'linear');
        	}
        	if(!$('.slider-next').is(":animated")){
        		$('.slider-next').animate({'right':'-40px'},500,'linear');
        	}
			  
		}
	)
	
	
	//内容展示的小效果
//	$('.cool-content ul li').each(function(index){
//		$(this).mouseover(function(){
//		if(!$(this).children().children('.extra').is(":animated")){  
//  		$(this).children().children('.extra').slideDown('fast');
//  		$(this).children().children('.thumb').children().children().css({'top':'10px'});
//  		$(this).children().children('.thumb').append('<div class="gray"></div');
//  		
//		}
//	})
//		$('.cool-content ul li').mouseout(function(){
//			if(!$(this).children().children('.extra').is(":animated")){  
//  		$(this).children().children('.extra').slideUp('fast');
//  		$(this).children().children('.thumb').children().children().css({'top':'0px'});
//  		$('.gray').remove();
//		}
//		})
//	})
	
	
	//用户登录与注册
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
