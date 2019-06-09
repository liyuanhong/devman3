  <?php 
  //控制左侧选项卡显示状态的变量
  $item = getIndexOfUrl($this,2);
  $isLogin = $params['isLogin'];
  
  
  ?>
  
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li <?php echo ctrLeftArrowShow($item,"showdevs");?>>
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>设备查询</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" <?php echo ctrLeftItemExpand($item,"showdevs");?>>
            <li <?php echo ctrLeftItemShow($item,"showdevs");?> id="show_dev"><a href="#"><i class="fa fa-circle-o"></i>查看设备</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>反馈信息</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>设备管理</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>编辑设备</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>添加设备</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>盘点设备</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>辅助功能</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>日志查询</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>图片对比</a></li>
          </ul>
        </li>
        <li <?php echo ctrLeftArrowShow($item,"myPage");?>>
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>用户中心</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu" <?php echo ctrLeftItemExpand($item,"mypage");?>>
            <li <?php echo ctrLeftItemShow($item,"mypage");?> id="mypage"><a href="#"><i class="fa fa-circle-o"></i>我的页面</a></li>
              <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>编辑资料</a></li>
              <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>用户管理</a></li>
          </ul>
        </li>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>系统设置</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>编辑设备</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>添加设备</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>盘点设备</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-chevron-circle-right"></i> <span>关于系统</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>系统教程</a></li>
            <li class="menu"><a href="#"><i class="fa fa-circle-o"></i>版本信息</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>
  <script type="text/javascript">
  changeMenu();      //index.js
  </script>