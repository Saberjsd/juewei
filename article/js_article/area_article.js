$(function(){
	$('#tuijian>li').mouseenter(function(){
		var This=$(this).children('a');
		var Thisimg=$(this).find('img');
		
		Thisimg.css("margin-top","-20px");
		This.css("margin-top","-20px");
	});
	$("#tuijian>li").mouseleave(function() {
		var This=$(this).children('a');
		var Thisimg=$(this).find('img');

		Thisimg.css("margin-top","0px");
		This.css("margin-top","0px");
	});
	
	$('.comment-list>li').mouseenter(function(){
		var This=$(this).find('span').eq(2);
		This.css("display","block");
	})
	$('.comment-list>li').mouseleave(function(){
		var This=$(this).find('span').eq(2);
		This.css("display","none");
	})
	
	var $artid=$('#artid').attr('value');
	console.log($artid);

	$.ajax({
		url: './view.php',
		type: 'get',
		dataType: 'json',
		data: {artid: $artid},
	})
	.done(function() {
		console.log("success");
	})

	
	$('#submit').click(function(event) {
		$.ajax({
			url: './comment_area.php',
			type: 'post',
			dataType: 'json',
			data:$('#comment_area').serialize(),
		})
		.done(function(data) {
			if(data.r1=="ok"){
				window.location.reload();
			}
		})
		
	});


	$('#user-signin').click(function(event) {
		console.log(123);
		$.ajax({
			url: './likes.php',
			type: 'get',
			dataType: 'json',
			data:{artid:$artid},
		})
		.done(function(data) {
			if(data.r1=="ok"){
				console.log(13513151)
				window.location.reload();
			}
		})


	});
	
	
})