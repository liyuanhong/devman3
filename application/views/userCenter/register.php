<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/dist/css/AdminLTE.min.css">

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

    <form action="../../index.html" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="登陆名">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="邮箱">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="密码">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="确认密码">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> 我同意 <a href="#">用户使用协议</a>
            </label>
          </div>
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

<script src="<?php echo  'http://'.$rootUrl ?>static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo  'http://'.$rootUrl ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo  'http://'.$rootUrl ?>static/plugins/iCheck/icheck.min.js"></script>
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
