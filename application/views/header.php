  <header class="main-header">
    <a href="javascript:void(0);"class="logo" onclick="backToHomePage()">
      <span class="logo-mini"><b>V</b>3</span>
      <span class="logo-lg"><b>设备管理系统</b>V3</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo  'http://'.$rootUrl ?>static/dist/img/user2-160x160-2.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Hi~,快来登陆吧~</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo  'http://'.$rootUrl ?>static/dist/img/user2-160x160-2.jpg" class="img-circle" alt="User Image">

                <p>
                  你还没有登陆哦
                  <small>欢迎登陆~</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">注册</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">登录</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>