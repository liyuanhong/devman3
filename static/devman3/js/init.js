//设置设备列表默认列的显示信息
function setDefaultDevColumn(){
	devColumn = $.cookie('devColumn');
	if(typeof(devColumn) == "undefined"){
		var temp = new Array("aaa","bbb","ccc");
		$.cookie('devColumn', temp);
	}else{
		
	}
}