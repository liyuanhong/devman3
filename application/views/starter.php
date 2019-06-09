<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>设备管理系统V3</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="<?php echo  base_url(); ?>static/dist/fonts.googleapis.com.css">
<!--   <link rel="stylesheet" -->
<!--         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
        
  <script src="<?php echo  base_url(); ?>static/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo  base_url(); ?>static/jquery_cookie/jquery.cookie.js"></script>
  <script src="<?php echo  base_url(); ?>static/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php echo  base_url(); ?>static/dist/js/adminlte.min.js"></script>
  <script src="<?php echo  base_url(); ?>static/devman3/js/init.js"></script>
  <script src="<?php echo  base_url(); ?>static/devman3/js/index.js"></script>

  <!-- 我的资源 -->
  <link rel="stylesheet" href="<?php echo  base_url(); ?>static/devman3/css/starter.css">
        
</head>
<?php
$arr = array();
$arr['params'] = $params;
$baseUrl = $params['base_url'];
$siteUrl = $params['site_url'];
$isLogin = $params['isLogin'];
?>

<body class="hold-transition skin-blue sidebar-mini" id="syno-nsc-ext-gen3" base_url="<?php echo $baseUrl ;?>" site_url="<?php echo $siteUrl ;?>">
<div class="wrapper">

<?php $this->load->view('header',$arr);?>
<?php $this->load->view('aside',$arr);?>
  <div>
    <?php
    $theCtr = getIndexOfUrl($this,1);
    $thePage = getIndexOfUrl($this,2);

    //echo "<H1>$thePage</H1>";

    //if($theCtr == "Welcome" || $theCtr == "welcome" || $theCtr == ""){
    if($theCtr == "welcome"){
        //查看设备页面
        if($thePage == "showdevs"){
            $this->load->view('viewdev/show_devs',$arr);
        }else{
            echo "没有页面！";
        }
    //}else if($theCtr == "UserCenter" || $theCtr == "usercenter" || $theCtr == "Usercenter"){
    }else if($theCtr == "usercenter"){
        if($thePage == "mypage"){
            checkLogin($isLogin,$baseUrl);
            $this->load->view('usercenter/myPage',$arr);
        }else if($thePage == "editprofile"){
            checkLogin($isLogin,$baseUrl);
            $this->load->view('usercenter/editPage',$arr);
        }else{
            checkLogin($isLogin,$baseUrl);
            $this->load->view('usercenter/myPage',$arr);
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