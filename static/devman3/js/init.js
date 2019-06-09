//获取网站的根url（）
function getRootUrl(){
	var base_url = $("#syno-nsc-ext-gen3").attr("base_url");
	var site_url = $("#syno-nsc-ext-gen3").attr("site_url");

	if(base_url.charAt(base_url.length - 1) != "/"){
		base_url = base_url + '/';
	}else{
		//base_url = base_url.substr(0,base_url.length - 1);
	}
	if(site_url.charAt(site_url.length - 1) != '/'){
		site_url = site_url + '/';
	}else{
		//site_url = site_url.substr(0,site_url.length - 1);
	}

	var root_url = base_url;
	return root_url;
}

//获取网站的根路径，去掉域名后的路径
function getRootDir(){
	var domain = document.domain;
	domain = "http://" + domain;
	var base_url = $("#syno-nsc-ext-gen3").attr("base_url");
	var rootdir = base_url.substr(domain.length,base_url.length - 1);
	if(rootdir.charAt(rootdir.length - 1) == "/"){
		rootdir = rootdir.substr(0,rootdir.length - 1);
	}
	return rootdir;
}

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
		$.cookie('devColumn', temp,{path:getRootDir(),expires:7});
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
		var i = 0;
		for(i;i < devColumn.length;i++){
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

//获取要请求url的参数
function getParams(){
	var showColumnStr = getColFromCookie();
	var params = new Array();
	params["showColumn"] = showColumnStr;
	params["token"] = $.cookie('token')
	params["rowCount"] = $.cookie('rowCount');
	return params;
}

//清除列显示的cookie
function clearDefaultDevColumn(){
	$.removeCookie('devColumn',{path:getRootDir()});
}
 
//获取设备列表默认的列显示信息
function getDefaultDevColumn(){
	var devColumn = $.cookie('devColumn').split(",");
	var temp = "";
	var i = 0
	for(i;i < devColumn.length;i++){
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

//获取cookie里面保存的还要显示的列信息
function getColFromCookie(){
	var devColumn = $.cookie('devColumn').split(",");
	var col = "";
	var i = 0;
	for(i;i < devColumn.length;i++){
		if("model" == devColumn[i]){
			col = col + "a";
		}else if("theNum" == devColumn[i]){
			col = col + "b";
		}else if("plateform" == devColumn[i]){
			col = col + "c";
		}else if("version" == devColumn[i]){
			col = col + "d";
		}else if("borrower" == devColumn[i]){
			col = col + "e";
		}else if("applyFor" == devColumn[i]){
			col = col + "f";
		}else if("owner" == devColumn[i]){
			col = col + "g";
		}else if("borrow_time" == devColumn[i]){
			col = col + "h";
		}else if("status" == devColumn[i]){
			col = col + "i";
		}else if("comments" == devColumn[i]){
			col = col + "j";
		}
	}
	return col;
}

//判断 devColumn中是否有某一个cookie值，有则删除，没有则添加
function operateDevColumn(col){
	var devColumn = $.cookie('devColumn').split(",");
	var ind = devColumn.indexOf(col);
	if(ind != -1){
		devColumn.splice(ind,1);
		$.cookie('devColumn', devColumn,{path:getRootDir(),expires:7});
	}else{
		devColumn.push(col);
		$.cookie('devColumn', devColumn,{path:getRootDir(),expires:7});
	}
}

//初始化侧边栏的展开或收起
function initLeftMenuShow(){
	var isLeftItemOpen = $.cookie('isLeftItemOpen');
	if(typeof(isLeftItemOpen)  == "undefined"){
		isLeftItemOpen = true;
		$.cookie('isLeftItemOpen', isLeftItemOpen,{path:getRootDir(),expires:7});
		$("#syno-nsc-ext-gen3").attr("class","skin-blue sidebar-mini ext-webkit ext-chrome ext-mac");
		$("#show_devs_containt_view").css("margin-left","230px");
	}else{
		if(isLeftItemOpen == "true"){
			$("#syno-nsc-ext-gen3").attr("class","skin-blue sidebar-mini ext-webkit ext-chrome ext-mac");
		}else{
			$("#syno-nsc-ext-gen3").attr("class","skin-blue sidebar-mini ext-webkit ext-chrome ext-mac sidebar-collapse");
		}
	}
}

//如果访问系统以没有带参数的网址，则自动跳转带参数的网址
function redirectParamsPage(){
	var curUrl = window.location.href;
	if(curUrl.indexOf('?') == -1){
		var params = getParams();
		getAnPage("welcome/showdevs",params);
	}
}

//切换页面按钮点击的方法
function changePage(){
	$("#pageButtonContent").find("a").click(function(){
		var curPage = parseInt($("#pageButtonContent").find(".active").find("a")[0].text);
		var curUrl = window.location.href;
		var hasPage = hasPageParam(curUrl);
		var page = this.text;
		var pageUrl = getPageUrl() + "&page=" + 1;
		if(page == "<<"){
			if(curPage == 1){
				//pageUrl = getPageUrl("index.php/welcome/showDevs") + "&page=1";
				pageUrl = replaceUrlPageParam(curUrl,curPage);
			}else{
				page = curPage - 1;
				//pageUrl = getPageUrl("index.php/welcome/showDevs") + "&page=" + page;
                pageUrl = replaceUrlPageParam(curUrl,page);
			}
			window.location.href = pageUrl;
		}else if(page == ">>"){
			if(curPage == 1){
				//pageUrl = getPageUrl("index.php/welcome/showDevs") + "&page=2";
                pageUrl = replaceUrlPageParam(curUrl,curPage);
			}else{
				page = curPage + 1;
				//pageUrl = getPageUrl("index.php/welcome/showDevs") + "&page=" + page;
                pageUrl = replaceUrlPageParam(curUrl,page);
			}
			window.location.href = pageUrl;
		}else{
			//pageUrl = getPageUrl("index.php/welcome/showDevs") + "&page=" + page;
            pageUrl = replaceUrlPageParam(curUrl,page);
			window.location.href = pageUrl;
		}
	});
}
//检查url 中是否有page参数
function hasPageParam(str){
	var index = str.search(/page=[0-9]*/);
	if(index == -1){
		return false;
	}else{
		return true;
	}
}
//替换url中的page参数
function replaceUrlPageParam(theUrl,page){
    var index = theUrl.search(/page=[0-9]*/);
    var pageUrl = theUrl;
    if(index == -1){
        pageUrl = pageUrl + "&page=" + page;
        console.log("bbb");
    }else{
        pageUrl = pageUrl.replace(/page=[0-9]*/,"page=" + page);
    }
    return pageUrl;
}

//给翻页按钮添加事件
function addPageButtonEvent(){
	changePage();
}

