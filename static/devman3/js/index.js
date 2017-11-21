//点击左侧栏目切换页面
function changeMenu(){
	$(".menu").click(function(){
		var id = $(this).attr("id");
		if(id == "show_dev"){
			getAnPage("index.php/welcome/showDevs");
		}
	});
}


//以get方式请求新的页面
function getAnPage(pageUrl,param){
	//url变量定义在parqms.js文件里面
	var app_url = url + pageUrl;
	window.location.href=app_url;
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