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
      var rowCount = $(this).val();
      $.cookie('rowCount', rowCount,{path:cookiePath,expires:7});
    })
}

//初始化每页设备显示的行数
function initRowCount(){
	var rowCount = $.cookie('rowCount');
	if(typeof(rowCount) == "undefined"){
		rowCount = 50;
		$("#dataCtr").val(50);
		$.cookie('rowCount', rowCount,{path:cookiePath,expires:7});
	}else{
		$("#dataCtr").val(rowCount);
	}
}

//点击查询按钮执行的操作
function searchByInfo(){
	var searchType = "info";
	var platefrom = $("#plateform").val();
	var brand = $("#brand").val()
	var sys_version = $("#sys_version").val();
	var status = $("#status").val();
	var category = $("#category").val();
	var check_dev = $("#check_dev").val();
	var page = 1;

    var params = getParams();
    params["plateform"] = platefrom;
    params["brand"] = brand;
    params["version"] = sys_version;
    params["status"] = status;
    params["category"] = category;
    params["check_dev"] = check_dev;
    params["searchType"] = searchType;
    params["page"] = page;

    //var params = {"platefrom":plateform,"brand":brand,"version":version,"status":status,"category":category,"check_dev":check_dev,"searchType":searchType};
    getAnPage("index.php/welcome/showDevs",params);
}



