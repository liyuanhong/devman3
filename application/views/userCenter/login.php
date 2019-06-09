<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>登录</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/dist/css/AdminLTE.min.css">
  
  <!-- Google Font -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>

<?php
$arr = array();
$arr['params'] = $params;
$baseUrl = $params['base_url'];
$siteUrl = $params['site_url'];

?>

<body class="hold-transition login-page" style="background-color:#d5e2fe;" id="syno-nsc-ext-gen3" base_url="<?php echo $baseUrl ;?>" site_url="<?php echo $siteUrl ;?>">
<div class="login-box">
  <div class="login-logo">
    <a><b>登录</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">请登录后使用设备管理系统</p>

    <form action="<?php echo  base_url() ?>" method="post" id="submitData" onsubmit="return submitInfo();">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="用户名或邮箱" name="username" id="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="密码" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">记住登录状态
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
      <a href="<?php echo  base_url(); ?>usercenter/registAnUser" class="text-center">注册一个新用户</a>
      <a href="<?php echo  base_url(); ?>" class="text-center" style="float:right;">回到首页</a>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="<?php echo  base_url(); ?>static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo  base_url(); ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo  base_url(); ?>static/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo  base_url(); ?>static/plugins/encrypted/md5.js"></script>
<script src="<?php echo  base_url(); ?>static/jquery_cookie/jquery.cookie.js"></script>
<script src="<?php echo  base_url(); ?>static/devman3/js/init.js"></script>
<script src="<?php echo  base_url(); ?>static/devman3/js/index.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });

//提交登录信息
function submitInfo(){
	var loginName = $("#username").val();
	var password = $("#password").val();
	if(password == "" || loginName == ""){
		alert("用户名或密码不能为空");
		return false;
	}else{
		password = md5(password);
		$.ajax({
			url:getRootUrl() + "UserCenter_Ctr/loginReq",
			type:"post",
			data:{loginName:loginName,password:password},
			success:function(result){
				var obj = JSON.parse(result);
				var status = obj.status;
				var token = obj.token;
	        		if(status == 200){
	        			$.cookie('token', token,{path:getRootDir(),expires:1});
                        var gotoUrl = getRootUrl() + "welcome/showdevs";
	        			window.location.href=gotoUrl;
		        	}else{
			        	alert("用户名或密码错误！");
		        		return false;
			    }
            }
	    });
		return false;
	}
}
</script>
</body>
</html>