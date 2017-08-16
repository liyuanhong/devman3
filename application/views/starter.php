<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>设备管理系统V3</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="static/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="static/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- 我的资源 -->
  <link rel="stylesheet" href="static/devman3/css/starter.css">
        
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('header');?>
<?php $this->load->view('aside');?>
  <div class="content-wrapper" style="background-color: yellow;flex:1;">
    <?php $this->load->view('viewDev/show_devs');?>
  </div>
<?php $this->load->view('footer');?>
</div>
<script src="static/bower_components/jquery/dist/jquery.min.js"></script>
<script src="static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="static/dist/js/adminlte.min.js"></script>
</body>
</html>