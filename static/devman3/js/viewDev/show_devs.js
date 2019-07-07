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
      $.cookie('rowCount', rowCount,{path:getRootDir(),expires:7});
    })
}

//初始化每页设备显示的行数
function initRowCount(){
	var rowCount = $.cookie('rowCount');
	if(typeof(rowCount) == "undefined"){
		rowCount = 50;
		$("#dataCtr").val(50);
		$.cookie('rowCount', rowCount,{path:getRootDir(),expires:7});
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
    getAnPage("welcome/showdevs",params);
}

//通过关键字搜索的按钮
function searchByKeyword(){
    var searchType = "keyword";
	var keyword = $("#keyword").val();
    var page = 1;
    var params = getParams();
    params["keyword"] = keyword;
    params["searchType"] = searchType;
    params["page"] = page;

    getAnPage("welcome/showdevs",params);
}

//修改单项搜索的提示
function changePlaceholder(){
	var my_rule = $("#my_rule").val();
	var testField = $("#my_scope");
	if(my_rule == "等于"){
        testField.attr("placeholder","搜索词");
	}else if(my_rule == "包含"){
        testField.attr("placeholder","词|词|词");
	}else if(my_rule == "介于"){
        testField.attr("placeholder","数字1|数字2");
    }else if(my_rule == "大于"){
        testField.attr("placeholder","大于范围数值");
    }else if(my_rule == "小于"){
        testField.attr("placeholder","小于范围数值");
    }else if(my_rule == "不等于"){
        testField.attr("placeholder","搜索词");
    }else if(my_rule == "不包含"){
        testField.attr("placeholder","搜索词");
    }
}

//通过搜索范围来查询
function searchByScope(){
    var searchType = "scope";
	var my_rule = $("#my_rule").val();
	var my_baseon = $("#my_baseon").val();
	var my_scope = $("#my_scope").val();
    var page = 1;

    var params = getParams();
    params["baseon"] = my_baseon;
    params["rule"] = my_rule;
    params["scope"] = my_scope;
    params["searchType"] = searchType;
    params["page"] = page;

    getAnPage("welcome/showdevs",params);
}

/*
*点击图片跳转到设备详情页面
 */
function jumToDevdetail(e){
    var devid = $(e).parent().attr("devid");
    var params = getParams();
    params["id"] = devid;
    getAnPage("welcome/devdetails",params);
}

/*
*申请设备
 */
function applyForDev(e){
    var val = $(e).attr("val");
    var token = $.cookie('token');
    var devid = $(e).attr("tag");
    if(val == 0){
        $.ajax({
            url:getRootUrl() + "searchdev_ctr/applyForDev",
            type:"get",
            data:{"devid":devid,"token":token},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                var token = obj.token;
                if(obj["status"] == 200){
                    $(e).text("取消申请");
                    $(e).attr("val",1);
                    $(e).attr("class","btn btn-block btn-warning btn-sm");
                }else{
                    alert(obj["message"]);
                }
            }
        });
    }else if(val == 1){
        $.ajax({
            url:getRootUrl() + "searchdev_ctr/cancleApplyDev",
            type:"get",
            data:{"devid":devid,"token":token},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                var token = obj.token;
                if(obj["status"] == 200){
                    $(e).text("申 请");
                    $(e).attr("val",0);
                    $(e).attr("class","btn btn-block btn-success btn-sm");
                }else{
                    alert(obj["message"]);
                }
            }
        });
    }
}