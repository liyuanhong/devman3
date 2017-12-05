/**
 * 初始化设置设备列表默认列的显示信息，控制按钮的显示
 * 传给服务端的时候只用一个字段来表示，对应关系如下：
 * model=a ;   theNum=b ;   plateform=c ;   version=d
 * borrower = e ;   applyFor=f ;   owner = g
 * borrow_time = h ;   status=i ;   comments=j
 */
function initDefaultDevColumn(){
	var devColumn = $.cookie('devColumn');
	if(typeof(devColumn) == "undefined"){
		//do_someThing代表申请操作列
		var temp = new Array("model","theNum","plateform","version","borrower","applyFor","owner","borrow_time");
		$.cookie('devColumn', temp,{path:cookiePath,expires:7});
		$("#checkBut1").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut1").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut1").attr("checked","checked");
		$("#checkBut2").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut2").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut2").attr("checked","checked");
		$("#checkBut3").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut3").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut3").attr("checked","checked");
		$("#checkBut4").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut4").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut4").attr("checked","checked");
		$("#checkBut5").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut5").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut5").attr("checked","checked");
		$("#checkBut6").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut6").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut6").attr("checked","checked");
		$("#checkBut7").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut7").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut7").attr("checked","checked");
		$("#checkBut8").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
		$("#checkBut8").parent(".icheckbox_flat-green").attr("aria-checked",true);
		$("#checkBut8").attr("checked","checked");
	}else{
		var devColumn = $.cookie('devColumn').split(",");
		var temp = "";
		for(i = 0;i < devColumn.length;i++){
			temp = devColumn[i];
			switch(temp){
			case "model":
				$("#checkBut1").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut1").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut1").attr("checked","checked");
				break;
			case "theNum":
				$("#checkBut2").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut2").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut2").attr("checked","checked");
				break;
			case "version":
				$("#checkBut3").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut3").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut3").attr("checked","checked");
				break;
			case "plateform":
				$("#checkBut4").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut4").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut4").attr("checked","checked");
				break;
			case "borrower":
				$("#checkBut5").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut5").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut5").attr("checked","checked");
				break;
			case "applyFor":
				$("#checkBut6").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut6").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut6").attr("checked","checked");
				break;
			case "owner":
				$("#checkBut7").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut7").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut7").attr("checked","checked");
				break;
			case "borrow_time":
				$("#checkBut8").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut8").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut8").attr("checked","checked");
				break;
			case "status":
				$("#checkBut9").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut9").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut9").attr("checked","checked");
				break;
			case "comments":
				$("#checkBut10").parent(".icheckbox_flat-green").attr("class","icheckbox_flat-green checked");
				$("#checkBut10").parent(".icheckbox_flat-green").attr("aria-checked",true);
				$("#checkBut10").attr("checked","checked");
				break;
			}
		}
		
		
	}
}

//清除列显示的cookie
function clearDefaultDevColumn(){
	$.removeCookie('devColumn',{path:cookiePath});
}
 
//获取设备列表默认的列显示信息
function getDefaultDevColumn(){
	var devColumn = $.cookie('devColumn').split(",");
	var temp = "";
	for(i = 0;i < devColumn.length;i++){
		temp = temp + devColumn[i];
	}
	alert(temp);
}

//获取当前选中的按钮，并以字母表示，方便传给服务端
function getSelectColCheckButAsStr(){
	var the_model = "a";
	var the_theNum = "b";
	var the_plateform = "c";
	var the_version = "d";
	var the_borrower = "e";
	var the_applyFor = "f";
	var the_owner = "g";
	var the_borrow_time = "h";
	var the_status = "i";
	var the_comments = "j";
	
	var showColumn = "";
	
	if($("#checkBut1").is(":checked")){
		showColumn += the_model;
	}
	if($("#checkBut2").is(":checked")){
		showColumn += the_theNum;
	}
	if($("#checkBut3").is(":checked")){
		showColumn += the_version;
	}
	if($("#checkBut4").is(":checked")){
		showColumn += the_plateform;
	}
	if($("#checkBut5").is(":checked")){
		showColumn += the_borrower;
	}
	if($("#checkBut6").is(":checked")){
		showColumn += the_applyFor;
	}
	if($("#checkBut7").is(":checked")){
		showColumn += the_owner;
	}
	if($("#checkBut8").is(":checked")){
		showColumn += the_borrow_time;
	}
	if($("#checkBut9").is(":checked")){
		showColumn += the_status;
	}
	if($("#checkBut10").is(":checked")){
		showColumn += the_comments;
	}
	return showColumn;
}

//处理显示列选项按钮的点击操作
function dealColumnClick(e){
	var columnBut = $(e).find(".flat-red").val();
	var inputStat = $(e).find(".flat-red").is(":checked");
	switch(columnBut){
	case "model":
		operateDevColumn("model");break;
	case "theNum":
		operateDevColumn("theNum");break;
	case "plateform":
		operateDevColumn("plateform");break;
	case "version":
		operateDevColumn("version");break;
	case "borrower":
		operateDevColumn("borrower");break;
	case "applyFor":
		operateDevColumn("applyFor");break;
	case "owner":
		operateDevColumn("owner");break;
	case "borrow_time":
		operateDevColumn("borrow_time");break;
	case "status":
		operateDevColumn("status");break;
	case "comments":
		operateDevColumn("comments");break;
	}
}

//判断 devColumn中是否有某一个cookie值，有则删除，没有则添加
function operateDevColumn(col){
	var devColumn = $.cookie('devColumn').split(",");
	var ind = devColumn.indexOf(col);
	if(ind != -1){
		devColumn.splice(ind,1);
		$.cookie('devColumn', devColumn,{path:cookiePath,expires:7});
	}else{
		devColumn.push(col);
		$.cookie('devColumn', devColumn,{path:cookiePath,expires:7});
	}
}


