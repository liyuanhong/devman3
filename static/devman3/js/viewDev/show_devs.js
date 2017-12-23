//控制不同类别顶部搜索面板的显示
function switchDevType(){
	var type_id = $("#classification_ctrl").val();
	if(type_id != 1){
		$("#show_devs_phones_control").css("display","none");
	}else{
		$("#show_devs_phones_control").css("display","inline");
	}
}

//"显示列控制面板"的显示与隐藏
function showListCtrl(){
	if($(".list-ctrl").css("display") == "block"){
		$(".list-ctrl").css("display","none");
	}else if($(".list-ctrl").css("display") == "none"){
		$(".list-ctrl").css("display","block");
	}
}

//点击确认收起列显示面板
function confirmColumn(){
	if($(".list-ctrl").css("display") == "block"){
		$(".list-ctrl").css("display","none");
	}
	toShowDevsPage();
}

//设置页面要展示的数据行数
function setRowCount(){
	$("#dataCtr").on("change",function(){
      var rouCount = $(this).val();
      $.cookie('rouCount', rouCount,{path:cookiePath,expires:7});
    })
}

//初始化每页设备显示的行数
function initRowCount(){
	var rouCount = $.cookie('rouCount');
	if(typeof(rouCount) == "undefined"){
		rouCount = 50;
		$("#dataCtr").val(50);
		$.cookie('rowCount', rouCount,{path:cookiePath,expires:7});
	}else{
		$("#dataCtr").val(rouCount);
	}
}



