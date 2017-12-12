//跳转到注册页面
function openRegisterPage(){
	app_url = url + "index.php/welcome/registAnUser";
	window.location.href=app_url;
}

//跳转到登录页面
function openLoginPage(){
	app_url = url + "index.php/welcome/login";
	window.location.href=app_url;
}

//设置侧左边边栏暂开或收起
function setLeftItemStatus(){
	var classVal = $("#syno-nsc-ext-gen3").attr("class");
	if(classVal == "skin-blue sidebar-mini ext-webkit ext-chrome ext-mac"){
		//$("#syno-nsc-ext-gen3").attr("class","skin-blue sidebar-mini ext-webkit ext-chrome ext-mac sidebar-collapse");
		$.cookie('isLeftItemOpen', false,{path:cookiePath,expires:7});
	}else if(classVal == "skin-blue sidebar-mini ext-webkit ext-chrome ext-mac sidebar-collapse"){
		//$("#syno-nsc-ext-gen3").attr("class","skin-blue sidebar-mini ext-webkit ext-chrome ext-mac");
		$.cookie('isLeftItemOpen', true,{path:cookiePath,expires:7});
	}
}