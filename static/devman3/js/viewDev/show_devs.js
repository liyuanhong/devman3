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
}