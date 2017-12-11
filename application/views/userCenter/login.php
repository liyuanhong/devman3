<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo  'http://'.rootUrl ?>static/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo  'http://'.rootUrl ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.rootUrl ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.rootUrl ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.rootUrl ?>static/dist/css/AdminLTE.min.css">
  
  <!-- Google Font -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<body class="hold-transition login-page" style="background-color:#d5e2fe;">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>登录</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">请登录后使用设备管理系统</p>

    <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="用户名或邮箱" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="密码" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">记住登陆状态
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
        </div>
        <!-- /.col -->
      </div>
      <a href="<?php echo  'http://'.rootUrl?>index.php/welcome/registAnUser" class="text-center">注册一个新用户</a>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="<?php echo  'http://'.rootUrl ?>static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo  'http://'.rootUrl ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo  'http://'.rootUrl ?>static/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
