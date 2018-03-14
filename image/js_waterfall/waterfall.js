window.onload = function(){
   a(); 
}
$(function(){

    $('#group>ul>li').mouseenter(function(){
        var Thisul=$(this).children('ul');
        $(this).css("backgroundColor","#fff");
        Thisul.css("display","block");
        var imgid= $(this).children('i').children('img');
        imgid.attr("src","ico/pull-top.png ");
    })
    $('#group>ul>li').mouseleave(function(){
        $(this).css("backgroundColor","#f1f1f1");
        $(this).children('ul').css("display","none");
        var imgid= $(this).children('i').children('img');
        imgid.attr("src","ico/pull-bottom.png ");
    })
    $('.sub>li').mouseenter(function(){
        $(this).css({"backgroundColor":"#00c3b6"});
        $(this).children('a').css("color","#fff");
    })
    $('.sub>li').mouseleave(function(){
        $(this).css({"backgroundColor":"#fff"});
        $(this).children('a').css("color","#666");
    })
    

	$('.box-top').hover(function () {
	        $(this).find('.mys').first().css({
		        'height':$(this).find('img').first().innerHeight()
		    });

		    $(this).find('.mys').first().show();
		    $(this).find('.detail').first().show();
		    // console.log($(this).next('.like'));
		    // $(this).next('.like').children().first().show();
        },
        function () {
            $(this).find('.mys').first().hide();
            $(this).find('.detail').first().hide();
            // $(this).next('.like').children().first().hide();
        }
    );
	a();

		//窗口的滚动条事件
        $(window).scroll(function(event) {
            //怎么判断滚动条到了最下面
            if($(window).innerHeight() + $(window).scrollTop()  >=  $(document).innerHeight()-0){
            	var $page = $('.content11').attr('page');
                $.ajax({
                    url: './imagelist.php',
                    type: 'GET',
                    dataType: 'JSON',
                    data:{
                    		action:'load',
                    		page : $page
                		}
                })
                .done(function(imglist) {
                	// console.log(imglist);
                    var mydiv       = $('.content11'); 
                    mydiv.attr('page',imglist[0]);
                    imglist.shift();
                    // console.log(mydiv.attr('page'));
                    $(imglist).each(function(index, el) {
                    	// console.log(el);
                    		
                    	var imgsrc = el.content.split(',')[1];
                    	// console.log(title);
                        var imgbox  = $('.imgbox').first().clone(true);
                        imgbox.find('img').attr('src', imgsrc);
                        imgbox.find('.img-title a').html(el.title);
                        imgbox.appendTo(mydiv);
                    });
                    //从所有的图片信息里面截取部分显示出来
                    a();
                });
            }
        });

        $(window).resize(function(event) {
             var boxs    = $('.imgbox');
             //改变窗口大小的时候，需要清除历史定位属性
             //宽度高度也恢复到初始状态
             boxs.each(function(index, el) {
                 $(this).css({
                    position: 'static', //清除定位
                    // width:270
                 }).children().css({
                    // width:250
                 });
             });
            a();
        });

        
})

function a () {
            //开始处理瀑布流效果
            //1，我们需要知道第一排能显示多少张图片
            //2, 从第一排里面找到高度最小的那个盒子；
            //3，从第二排开始给图片定位属性，并且把图片定位到高度最小的盒子下面
            //4，定位完成以后，需要修改最小高度为原始高度+当前盒子的高度；
            var w_width     = $(window).innerWidth();
            //找到所有的盒子
            var boxs        = $('.imgbox');
            var b_width     = boxs.first().outerWidth(true);
            // console.log(b_width);
            //计算出第一排能显示多少张图片
            var num         = Math.floor(w_width/b_width);
            var newwidth    = Math.floor(w_width/num);
            // console.log(num);
            //遍历所有图片
            var boxheight   = [];
            boxs.each(function(ind, el) {
                // $(this).first().css({width:newwidth-10});
                // $(this).first().children().css({width:newwidth-20});
                //第一排图片不用定位，只需要找出所有高度放到数组里面
                if(ind < num){
                    boxheight.push($(this).outerHeight(true));
                }else{
                    //开始处理第二排开始的图片
                    //找到高度最小的盒子
                    var minheight = Math.min.apply(null, boxheight);
                    //根据最小值找下标
                    var minindex = boxheight.indexOf(minheight);
                    //获得这个盒子的left
                    var left = boxs.eq(minindex).position().left;
                    //改变当前盒子的CSS
                    $(this).css({
                        position:'absolute',
                        left:left,
                        top:minheight
                    });
                    //修改最小值
                    boxheight[minindex] += $(this).outerHeight(true);
                }
            });
        }