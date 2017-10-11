//控制不同类别顶部搜索面板的显示
function switchDevType(){
	var type_id = $("#classification_ctrl").val();
	if(type_id != 1){
		$("#show_devs_phones_control").css("display","none");
	}else{
		$("#show_devs_phones_control").css("display","inline");
	}
}