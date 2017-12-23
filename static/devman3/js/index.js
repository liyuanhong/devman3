//跳转到设备查询页面
function toShowDevsPage(){
	var params = getParams();
	getAnPage("",params);
}

//点击左侧栏目切换页面
function changeMenu(){
	$(".menu").click(function(){
		var id = $(this).attr("id");
		if(id == "show_dev"){
			var params = getParams();
			getAnPage("index.php/welcome/showDevs",params);
		}
	});
}

//获取要请求url的参数
function getParams(){
	var showColumnStr = getColFromCookie();
	var params = new Array();
	params["showColumn"] = showColumnStr;
	params["token"] = $.cookie('token')
	params["rowCount"] = $.cookie('rouCount');
	return params;
}

//跳转到指定页面
function gotoPage(pageUrl){
	var params = getParams();
	getAnPage(pageUrl,params);
}

//获取要跳转的url
function getPageUrl(pageUrl){
	//var showColumnStr = getSelectColCheckButAsStr();
	var devColumn = getColFromCookie();
	if(typeof(devColumn) == "undefined"){
		devColumn = "abcdefgh"
	}else{
		
	}
	var params = getParams();
	
	//url变量定义在parqms.js文件里面
	var app_url = url + pageUrl;
	if(getMapLength(params) == 0){
		return app_url;
	}else{
		var paramStr = "?";
		var i = 0;
		for(var key in params){
			if(i == 0){
				paramStr = paramStr + key + "=" + params[key];
			}else{
				paramStr = paramStr + "&" + key + "=" + params[key];
			}
			i++;
		}
		app_url = app_url + paramStr;
		return app_url;
	}
	
}

//以get方式请求新的页面
function getAnPage(pageUrl,params){
	//url变量定义在parqms.js文件里面
	var app_url = url + pageUrl;
	if(getMapLength(params) == 0){
		window.location.href=app_url;
	}else{
		var paramStr = "?";
		var i = 0;
		for(var key in params){
			if(i == 0){
				paramStr = paramStr + key + "=" + params[key];
			}else{
				paramStr = paramStr + "&" + key + "=" + params[key];
			}
			i++;
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
	var params = getParams();
	getAnPage("",params);
}

//获取map的长度
function getMapLength(map){
	var i = 0;
	for(var temp in map){
		i++;
	}
	return i;
}

//退出登陆
function logout(){
	var token = $.cookie('token');
	$.ajax({
		url:"http://" + host + path + "index.php/UserCenter/logoutReq",
		type:"post",
		data:{logout:true,token:token},
		success:function(result){
			var obj = JSON.parse(result);
			var status = obj.status;
			var token = obj.token;
        		if(status == 200){
        			$.removeCookie('token',{path:cookiePath});
        			gotoPage("index.php/welcome/showDevs");
	        	}else{
		        	alert("后端处理退出登陆失败：" + result);
		        	
		    }
    		}
    });
}