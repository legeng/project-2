var bannerLength = 0, pictureName = new Array();

$(document).ready(function() {
	initSwipe();
	$("#bannerPager").children('label').text(pictureName[0]);
});

//初始化滑动插件
function initSwipe(){
	var elem = document.getElementById("banner");

	window.mySwipe = Swipe(elem, {
		startSlide: 0,
		auto: 2500,
		continuous: true,
		disableScroll: false,
		stopPropagation: true,
		callback: function(index, element) { },
		transitionEnd: function(index, element) { changeBannerPager(index);}
	});
	initBannerPager(mySwipe.getNumSlides());
}
//写入banner页数
function initBannerPager(length){
	var i = 1;
	bannerLength = length;	

	$("#bannerPager").find("span").html('<a href="javascript:;" class="sel"></a>');
	for(i;i<bannerLength;i++){ $("#bannerPager").find("span").append('<a href="javascript:;" class="nosel"></a>'); }
}
//banner页数标记改变
function changeBannerPager(index){
	$("#bannerPager").find("span").children('a').attr("class","nosel");
	if(bannerLength == 2 && index>1){	//处理插件BUG
		switch(index){
			case 2:
				$("#bannerPager").find("span").children('a').eq(0).attr("class","sel");
				$("#bannerPager").children('label').text(pictureName[0]);
				break;
			case 3:
				$("#bannerPager").find("span").children('a').eq(1).attr("class","sel");
				$("#bannerPager").children('label').text(pictureName[1]);
				break;
		}
	}else{
		$("#bannerPager").find("span").children('a').eq(index).attr("class","sel");
		$("#bannerPager").children('label').text(pictureName[index]);
	}
}