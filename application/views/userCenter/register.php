<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="<?php echo  'http://'.ROOT_URL ?>static/bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page"  style="background-color: #d5e2fe;">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>注册</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">注册一个普通用户</p>

    <form action="<?php echo  'http://'.ROOT_URL ?>index.php/UserCenter/registerAnUser" method="post" onsubmit="return check()">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="登陆名" name="loginName" id="loginName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="用户名" name="userName" id="userName">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="邮箱" name="email" id="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="密码" name="password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="确认密码" id="confirmPassword">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" id="protocol"> 我同意 <a href="#">用户使用协议</a>
            </label>
          </div>
          <a href="<?php echo  'http://'.ROOT_URL?>" class="text-center">回到首页</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>

<script src="<?php echo  'http://'.ROOT_URL ?>static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo  'http://'.ROOT_URL ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo  'http://'.ROOT_URL ?>static/plugins/iCheck/icheck.min.js"></script>
<script>
$(function () {
$('input').iCheck({
  checkboxClass: 'icheckbox_square-blue',
  radioClass: 'iradio_square-blue',
  increaseArea: '20%' // optional
});
});

//验证表单是否符合要求
function check(){
	var loginName = $("#loginName").val();
	var username = $("#userName").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var confirmPassword = $("#confirmPassword").val();
	if(loginName == ""){
		alert("登陆名不能为空");
		return false;
	}else if(userName == ""){
		alert("用户名不能为空");
		return false;
	}else if(email == ""){
		alert("邮箱不能为空");
		return false;
	}else if(email.search(".*@.*\.com") == -1){
		alert("邮箱格式不正确");
		return false;
	}else if(password == "" || password.length <= 6){
		alert("密码必须大于6位，并且以字母或下划线开头！");
		return false;
	}else if(password != confirmPassword){
		alert("输入的密码不一致");
		return false;
	}
	return true;
}
</script>
</body>
</html>
