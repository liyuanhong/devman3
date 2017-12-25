<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>跳转登陆</title>
<script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/params.js"></script>
<style type="text/css">
  h3 {padding: auto;text-align: center;margin-top: 200px;}
</style>

</head>
<body class="hold-transition login-page" style="background-color:#d5e2fe;">
  <a href="<?php echo  'http://'.ROOT_URL.'index.php/welcome/login';?>"><h3 id= "info">3秒后跳转登陆界面...</h3></a>
</body>


<script>
	//倒计时
	var times = 2;
	var address = "http://" + host + path + "index.php/welcome/login"
	setInterval("timer()",1000);
	function timer(){
		if(times == 0){
			location.href=address;
		}
		var ele = document.getElementById("info");
		var info = times + "秒后跳转登陆界面...";
		ele.innerHTML = info;
		times--;
	}
</script>
</html>
