//设置设备列表默认列的显示信息
function setDefaultDevColumn(){
	devColumn = $.cookie('devColumn');
	if(typeof(devColumn) == "undefined"){
		//do_someThing代表申请操作列
		var temp = new Array("model","theNum","plateform","version","borrower","do_something","owner","borrow_time");
		$.cookie('devColumn', temp);
	}else{
		
	}
}