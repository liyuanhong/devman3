<?php 
$result = $this->SearchDev_Mod->getAllDevs();
$devs = $result;
$devNum = count($devs);
//显示列的行号
$rowNumber = 1;


?>
<link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/devman3/css/viewDev/show_devs.css">
<link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/bower_components/select2/dist/css/select2.min.css">
<script src="<?php echo  'http://'.$rootUrl ?>static/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo  'http://'.$rootUrl ?>static/devman3/js/viewDev/show_devs.js"></script>



  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo  'http://'.$rootUrl ?>static/plugins/iCheck/all.css">

<div id="show_devs_containt_view" class="content-wrapper">
  <div id="show_devs_top_control">
    <div id="classification">
        	<label>类型:</label>
        	<select class="form-control" id="classification_ctrl" style="width:100px;height:30px;display: inline;margin-left: 10px;" onchange="switchDevType()">
            <option value="1">手机平板</option>
            <option value="2">电脑</option>
            <option value="3">显示器</option>
            <option value="4">办公用品</option>
            <option value="5">桌椅</option>
        </select>
    </div>
    <div id="show_devs_phones_control" style="width: 84%;height: 200px;background:transparent;float:right;display:inline;">
      <div class="col-md-3 col-sm-4 search-item">平台：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>android</option>
            <option>ios</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">品牌：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>华为</option>
            <option>小米</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">系统：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>5.0</option>
            <option>4.4.4</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">状态：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>5.0</option>
            <option>4.4.4</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">分类：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>5.0</option>
            <option>4.4.4</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">盘点：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>5.0</option>
            <option>4.4.4</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4 search-item">
        <button type="button" class="btn btn-block btn-primary btn-sm" style="width:145px;">查询</button>
      </div>
      <div class="input-group input-group-sm" style="margin-left: 10px;padding-top: 15px;">
        <input type="text" class="form-control" style="width: 310px;">
            <span class="input-group-btn" style="display: block;float: left;">
              <button type="button" class="btn btn-info btn-flat">关键字搜索</button>
            </span> 
      </div>
      <div style="margin-left: 10px;padding-top: 15px;">单项搜索：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>设备名</option>
            <option>型号</option>
            <option>编号</option>
            <option>平台</option>
            <option>版本</option>
            <option>签借人</option>
            <option>所属</option>
        </select>
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>等于</option>
            <option>包含</option>
            <option>介于</option>
            <option>大于</option>
            <option>小于</option>
            <option>不等于</option>
            <option>不包含</option>
        </select>
        <input class="form-control select_style" placeholder="搜索词" style="width:200px;display:inline;height: 30px;">
        <button type="button" class="btn btn-primary btn-sm" style="width:60px;margin-bottom: 4px;">搜索</button>
      </div>
    </div>
  </div>
<!-- 设备显示区域 -->
  <div id="show_devs_show_devs">
    <div class="box" style="border-top: 0px;">
        <!-- /.box-header --> 
        <div class="box-body" style="padding-bottom: 0px;">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-6">
                <div class="dataTables_length" id="example1_length" style="display:inline;margin-bottom: 0px;">
                  <label style="margin-bottom: 0px;">展示 <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                  <option value="200">200</option>
                  <option value="500">500</option>
                  </select> 行</label>
                </div>
              </div>

            <!-- 表格列控制start -->
           <div style="display:inline;float:right;margin-right: 295px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="showListCtrl()">
              <i class="fa fa-fw fa-cog" style="font-size: medium;margin-top:8px;"></i>显示列
            </a>
            <ul class="list-ctrl" style="padding:0px;position: absolute;z-index: 99;display: none;">
             <div style="width: 300px;height: 170px;background-color:#eef7ff;padding:5px;border-radius:8px;">
            <!--    表格控制内容 -->
            
            <style type="text/css">
                .list-ctrl  td {width: 32%;height:28px;}
                .icheckbox_flat-green {vertical-align:bottom;}
            </style>
            <div class="form-group">
            	    <table style="width: 290px;"> 
            	    	    <tr>
            	    	        <td>
            	    	    	        <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut1" value="model" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                </ins></div>型号</label>
                        </td><td>
                            <label class=""  onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut2" value="theNum" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>编号</label>
                        </td><td onclick="dealColumnClick(event)">
                            <label class=""  onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut3" value="version" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>版本</label>
                        </td></tr>
            		    	    <tr><td>
            	    	    	        <label class=""  onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut4" value="plateform" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>平台</label>
                        </td><td>
                            <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut5" value="borrower" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>签借人</label>
                        </td><td>
                            <label class=""  onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut6" value="applyFor" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>申请</label>
                        </td></tr>
            	    	        <tr><td>
            	    	    	        <label class=""  onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut7" value="owner" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>所属</label>
                        </td><td>
                            <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut8" value="borrow_time" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>借出时间</label>
                        </td><td>
                            <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut9" value="status" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>状态</label>
                        </td></tr>
            	    	        <tr><td>
            	    	    	        <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut10" value="comments" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>备注</label>
                        </td>
            	    	    </tr>
            	    </table>
                <button type="button" class="btn btn-block btn-primary btn-sm" style="width:60px;margin-top: 10px;" onclick="confirmColumn()">确定</button>
              </div>
             </div>
          </div>
          <!-- 表格列控制end -->
        </div>
    </div>
  </div>
<!-- 设备表格区域start -->
        <div class="row" style="margin-left: 0px;margin-right: 0px;">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row" style="height:30px;">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">#</th>
                  <th class="noafter sorting"><label style="width: 70px;margin-bottom: 0px;">图片</label></th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201px;">设备名</th>
                  <th class="sorting" tabindex="3" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">型号</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 219px;">编号</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 165px;">平台</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 119px;">版本</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">签借人</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">申请</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">所属</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 155px;">借出时间</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($devs as $dev){?>
                <tr role="row" class="odd">
                  <td><?php echo $rowNumber++;?></td>
                  <td style="padding:1px;"><div style="height:63px;width:63px;"><img style="height: 63px;" src="<?php echo 'http://'.$host.'/devman3/files/thumbnail/'.trim($dev->path);?>"/></div></td>
                  <td class="sorting_1"><?php echo $dev->device_name;?></td>
                  <td><?php echo $dev->model;?></td>
                  <td><?php echo $dev->theNum;?></td>
                  <td><?php echo $dev->plateform;?></td>
                  <td><?php echo $dev->version;?></td>
                  <td><?php echo $dev->borrower;?></td>
                  <td><?php ?></td>
                  <td><?php echo $dev->owner;?></td>
                  <td><?php echo $dev->borrow_time;?></td>
                </tr>
                <?php }?>
                </tbody>
              </table>  
<!-- 设备表格区域end -->
            </div>
          </div>
          <ul class="pagination" style="float:right;margin-top: 15px;margin-right: 15px;">
            <li class="paginate_button previous disabled" id="example1_previous">
              <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0"><<</a>
            </li>
            <li class="paginate_button active">
              <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
            </li>
            <li class="paginate_button ">
              <a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a>
            </li>
            <li class="paginate_button ">
              <a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a>
            </li>
            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li>
            <li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li>
            <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">>></a></li>
            </ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
</div>
<script src="<?php echo  'http://'.$rootUrl ?>static/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo  'http://'.$rootUrl ?>static/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    })
  })
  //控制页面加载后设备列表图片不显示排序图标
  $(function(){
	$("th.noafter").removeClass("sorting");
	$("th.noafter").removeClass("after");
	$("th.noafter").removeClass("sorting_asc");
  })
  
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  })
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

</script>