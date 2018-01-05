<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>设备管理系统V3</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/dist/fonts.googleapis.com.css">
<!--   <link rel="stylesheet" -->
<!--         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
        
  <script src="<?php echo  'http://'.ROOT_URL ?>static/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/jquery_cookie/jquery.cookie.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/dist/js/adminlte.min.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/params.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/init.js"></script>
  <script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/index.js"></script>

  <!-- 我的资源 -->
  <link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/devman3/css/starter.css">
        
</head>

<body class="hold-transition skin-blue sidebar-mini" id="syno-nsc-ext-gen3">
<div class="wrapper">
<?php 
$arr = array();
$arr['params'] = $params;



?><?php 
$this->load->view('header',$arr);?>
<?php $this->load->view('aside',$arr);?>
  <div>
    <?php
    $theCtr = getIndexOfUrl($this,1);
    $thePage = getIndexOfUrl($this,2);
    if($theCtr == "Welcome" || $theCtr == "welcome" || $theCtr == ""){
        //查看设备页面
        if($thePage == '' || $thePage == "showDevs"){
            $this->load->view('viewDev/show_devs',$arr);
        }else{
            echo "没有页面！";
        }
    }else if($theCtr == "UserCenter" || $theCtr == "usercenter" || $theCtr == "Usercenter"){
        if($thePage == "mypage" || $thePage == "myPage"){
            $this->load->view('userCenter/myPage',$arr);
        }else{
            $this->load->view('userCenter/myPage',$arr);
        }
    }else{
        echo "哈哈哈";
    }

    ?>
  </div>
<?php $this->load->view('footer');?>
</div>
</body>
</html>