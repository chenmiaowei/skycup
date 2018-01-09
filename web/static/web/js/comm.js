$(function(){
	// 判断ie
	var isIE = function(){
		if ((navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/7./i)=="7.") || (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/8./i)=="8.") || (navigator.appName == "Microsoft Internet Explorer" && navigator.appVersion.match(/9./i)=="9.")) {
			return true;
		}else{
			return false;
		}
	}

	if(isIE()){
		$("body").find('div').hide();
		$("body").append('<p style="font-size: 60px; text-align:center;line-height:1">您的浏览器版本过低，请更换浏览器</p>')
		return false
	}



	/*nav*/
	$(".pc .nav").click(function(event) {
		$(".pc .nav-box").toggleClass('nav-box-active');
		$("html").toggleClass('cantScroll');
	});
	$(".h5 .nav-li-fat").click(function(event) {
		$(this).parent().find('.sub-nav-box').toggleClass('sub-nav-box-now');
		$(this).toggleClass('nav-li-now');
	});
	$(".h5 .icon-nav").click(function(event) {
		$(".h5 .h5-nav-box").addClass('h5-nav-now');
		$("html").addClass('cantScroll');
	});
	$(".h5 .icon-close").click(function(event) {
		$(".h5 .h5-nav-box").removeClass('h5-nav-now');
		$("html").removeClass('cantScroll');
	});
	$(".pc .search").click(function(event) {
		$(".search-box").show();
		$("html").addClass('cantScroll');
	});
	$(".pc .search-close").click(function(event) {
		$(".search-box").hide();
		$("html").removeClass('cantScroll');
	});

	//banner
	function conBanFunc() {
		$(".ban .loader").stop().fadeOut(1000);
		$(".ban h2").addClass('ban-h2-ani');
		$(".ban h3").addClass('ban-h3-ani');
	}
	var conBan = $(".ban"),
		conBanSrc = conBan.attr("data-img"),
		conBanImg = new Image();
	conBanImg.src = conBanSrc;
	//处理ff下会自动读取缓存图片
	if(conBanImg.complete || conBanImg.width){
		conBan.attr("style","background:url("+conBanSrc+") no-repeat center");
		conBanFunc()
	    return;
	}
	$(conBanImg).load(function(){
		conBan.attr("style","background:url("+conBanSrc+") no-repeat center");
		conBanFunc()
	});



});
var winH = $(window).height()

$(window).scroll(function(event) {
	// 子导航
	$(window).scrollTop() >= winH ? $(".pc .sub-nav").css({'top':0, 'position':"fixed"}) : $(".pc .sub-nav").css({'top':'100vh', 'position':"absolute"});
	// 发展历程
	var hislength = $(".his-list").find(".his-box").length
	for(var i = 0; i< hislength; i++){
		if($(window).scrollTop() >= (winH / 2) + 488*i){
			if(!$(".his-list").find('.his-box').eq(i).find(".img-cont").hasClass('img-cont-ani')){
				$(".his-list").find('.his-box').eq(i).find(".img-cont").addClass('img-cont-ani')
				$(".his-list").find('.his-box').eq(i).find(".his-text-box").addClass('his-text-box-ani')
			}
		}
	}

	//新闻
	if($(window).scrollTop() >= (winH / 2)){
		if(!$(".new-pc .new-top").find('.new-box').eq(0).hasClass('new-box-ani')){
			$(".new-pc .new-top").find('.new-box').addClass('new-box-ani')
		}
	}

});