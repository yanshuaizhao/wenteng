$(document).ready(function(){
	$('.kymain .section_1 .listmodel ul li .s2 .model2 a').click(function(){
	var thisli=$(this).parents('li');
	$(thisli).find('.others').stop()
	$(thisli).find('.others').slideToggle()
})

$('.kymain .section_1 .listmodel ul li .s2 .model').click(function(){
	$(this).find('i').toggleClass('yes')
})

$('.kymain .section_1 .desc a').click(function(){
	$('.alertbox').fadeIn()
})
$('.alertbox .zzbox').click(function(){
	$('.alertbox').fadeOut()
})




$('.free .sec3 .tablebox3w tr td .delet').click(function(){
	var thisa=$('.free .sec3 .tablebox3w tr td .delet').index(this);
	$('.free .sec3 .tablebox3w tr').eq(thisa+1).hide()

})


$('#sxbox').click(function(){
	$('#showall').slideToggle()
})

$('.head .nav ul li').mouseover(function(){
	$(this).find('dl').stop();
	$(this).find('dl').slideDown(250);
})
$('.head .nav ul li').mouseout(function(){
	$(this).find('dl').stop();
	$(this).find('dl').slideUp(200);
})



$('.section_c .list_1 ul li .box').click(function(){
	$('.section_c .list_1 ul li .box').removeClass('current');
	$(this).addClass('current')
})










$('.userbox ul li.fx2 .h2tit a').click(function(){
	$('.userbox ul li .slidelist').fadeToggle()
})


$('body').append("<div id='btn_top'><img src='images/return.png'></div>")



 $(document).ready(function() {
        $("#btn_top").hide();
        $(function() {
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    $("#btn_top").fadeIn(500);
                } else {
                    $("#btn_top").fadeOut(500);
                }
            });
            //当点击跳转链接后，回到页面顶部位置
            $("#btn_top").click(function() {
                $('body,html').animate({
                    scrollTop: 0
                },
                1000);
                return false;
            });
        });
    });













})