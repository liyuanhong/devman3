<?php 
$result = $this->SearchDev_Mod->getAllDevs();
$devs = $result;
$devNum = count($devs);
$rowNumber = 1;

?>
<link rel="stylesheet" href="static/devman3/css/viewDev/show_devs.css">
<link rel="stylesheet" href="static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="static/bower_components/select2/dist/css/select2.min.css">
<script src="static/bower_components/select2/dist/js/select2.full.min.js"></script>
<div id="show_devs_containt_view" class="content-wrapper">
  <div id="show_devs_top_control">
    <div id="classification">
        	<label>类型:</label>
        	<select class="form-control" style="width:100px;height:30px;display: inline;margin-left: 10px;">
            <option>手机平板</option>
            <option>电脑</option>
            <option>显示器</option>
            <option>办公用品</option>
            <option>桌椅</option>
        </select>
    </div>
    <div style="width: 84%;height: 200px;background-color:pink;float:right;display:inline;padding-top: 10px;">
      <div class="col-md-3 col-sm-4">平台：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>android</option>
            <option>ios</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4">品牌：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>华为</option>
            <option>小米</option>
        </select>
      </div>
      <div class="col-md-3 col-sm-4">系统：
        <select class="form-control" style="width:100px;height:30px;display: inline;">
            <option>5.0</option>
            <option>4.4.4</option>
        </select>
      </div>
    </div>
  </div>
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
           <div class="dropdown user user-menu" style="display:inline;float:right;margin-right: 295px;">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-fw fa-cog hidden-xs" style="font-size: medium;margin-top:8px;"></i>显示列
            </a>
            <ul class="dropdown-menu" style="padding:0px;">
             <div style="width: 300px;height: 200px;background-color: pink;padding:5px;">哈哈</div>
          </div>
          <!-- 表格列控制end -->
        
        
        </div>
    </div>
  </div>
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
                  <td style="padding:1px;"><div style="height:63px;width:63px;"><img style="height: 63px;" src="<?php echo 'http://localhost/devman3/files/thumbnail/'.$dev->path;?>"/></div></td>
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
<script src="static/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
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
</script>