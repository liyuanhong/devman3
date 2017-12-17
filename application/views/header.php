  <?php 
$isLogin = $params['isLogin'];

?>
  <script src="<?php echo  'http://'.rootUrl ?>static/devman3/js/header.js"></script>
  <header class="main-header">
    <a href="javascript:void(0);"class="logo" onclick="backToHomePage()">
      <span class="logo-mini"><b>V</b>3</span>
      <span class="logo-lg"><b>设备管理系统</b>V3</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="setLeftItemStatus()">
        <span class="sr-only">Toggle navigation</span>
      </a>
<!--  alert window start -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo  'http://'.rootUrl ?>static/dist/img/user2-160x160-2.jpg" class="user-image" alt="User Image">
              <?php if($isLogin){?>
              <span class="hidden-xs"><?php echo $params['userInfo'][0]['user_name'];?>~</span>
              <?php }else{?>
              <span class="hidden-xs">Hi~,快来登录吧~</span>
              <?php }?>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo  'http://'.rootUrl ?>static/dist/img/user2-160x160-2.jpg" class="img-circle" alt="User Image">
                <?php if($isLogin){?>
                <p>你好：<?php echo $params['userInfo'][0]['user_name'];?>~</p>
                <?php }else{?>
                <p>你还没有登录哦<small>欢迎登录~</small></p>
                <?php }?>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <?php if($isLogin){ ?>
                    <a href="#" class="btn btn-default btn-flat" onclick="">用户信息</a>
                <?php }else{?>
                  <a href="#" class="btn btn-default btn-flat" onclick="openRegisterPage()">注册</a>
                <?php }?>
                </div>
                <div class="pull-right">
                <?php if($isLogin){?>
                  <a href="#" class="btn btn-default btn-flat" onclick="logout()">退出登录</a>
                  <?php }else{?>
                  <a href="#" class="btn btn-default btn-flat" onclick="openLoginPage()">登录</a>
                  <?php }?>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!--  alert window end -->
    </nav>
  </header>