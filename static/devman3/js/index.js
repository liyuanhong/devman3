//跳转到设备查询页面
function toShowDevsPage(){
	var showColumnStr = getSelectColCheckButAsStr();
	var showColumn = new Array();
	showColumn["showColumn"] = showColumnStr;
	getAnPage("",showColumn);
}

//点击左侧栏目切换页面
function changeMenu(){
	$(".menu").click(function(){
		var id = $(this).attr("id");
		if(id == "show_dev"){
			var showColumnStr = getSelectColCheckButAsStr();
			var showColumn = new Array();
			showColumn["showColumn"] = showColumnStr;
			getAnPage("index.php/welcome/showDevs",showColumn);
		}
	});
}

//以get方式请求新的页面
function getAnPage(pageUrl,params){
	//url变量定义在parqms.js文件里面
	var app_url = url + pageUrl;
	if(getMapLength(params) == 0){
		window.location.href=app_url;
	}else{
		var paramStr = "?";
		for(var key in params){
			paramStr = paramStr + key + "=" + params[key];
		}
		app_url = app_url + paramStr;
		window.location.href=app_url;
	}
}


//以post方式请求页面
function post(URL, PARAMS) {
  var temp = document.createElement("form");
  temp.action = URL;
  temp.method = "post";
  temp.style.display = "none";
  for (var x in PARAMS) {
    var opt = document.createElement("textarea");
    opt.name = x;
    opt.value = PARAMS[x];
    temp.appendChild(opt);
  }
  document.body.appendChild(temp);
  temp.submit();
  return temp;
}

//回到首页的请求操作
function backToHomePage(){
	var showColumnStr = getSelectColCheckButAsStr();
	var showColumn = new Array();
	showColumn["showColumn"] = showColumnStr;
	getAnPage("",showColumn);
}

//获取map的长度
function getMapLength(map){
	var i = 0;
	for(var temp in map){
		i++;
	}
	return i;
}