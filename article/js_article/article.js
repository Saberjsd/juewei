$(function(){
	
	$('#group>ul>li').mouseenter(function(){
		var Thisul=$(this).children('ul');
		$(this).css("backgroundColor","#fff");
		Thisul.css("display","block");
		var imgid= $(this).children('i').children('img');
		imgid.attr("src","ico/下.png ");
	})
	$('#group>ul>li').mouseleave(function(){
		$(this).css("backgroundColor","#f1f1f1");
		$(this).children('ul').css("display","none");
		var imgid= $(this).children('i').children('img');
		imgid.attr("src","ico/下拉.png ");
	})
	$('.sub>li').mouseenter(function(){
		$(this).css({"backgroundColor":"#00c3b6"});
		$(this).children('a').css("color","#fff");
	})
	$('.sub>li').mouseleave(function(){
		$(this).css({"backgroundColor":"#fff"});
		$(this).children('a').css("color","#666");
	})
	

	$.ajax({
		url: './article.php',
		type: 'post',
		dataType: 'json',
		data: $('#ul_group').serialize(),
	})
	.done(function(data) {
		if(data.r1=='ok'){
			
		}
	})
	
	

	
	
	
	
})
