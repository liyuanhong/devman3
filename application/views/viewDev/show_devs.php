<link rel="stylesheet" href="static/devman3/css/viewDev/show_devs.css">
<link rel="stylesheet" href="static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div id="show_devs_containt_view" class="content-wrapper">
  <div id="show_devs_top_control">

  </div>
  <div id="show_devs_show_devs">
    <div class="box" style="border-top: 0px;">
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>展示 <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="500">500</option>
                      </select> 行</label>
                    </div>
                  </div>
                <div class="col-sm-6">
              <div id="example1_filter" class="dataTables_filter">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row" style="height:30px;">
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">#</th>
                  <th><label class="noafter" style="width: 30px;margin-bottom: 0px;">图片</label></th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201px;">设备名</th>
                  <th class="sorting" tabindex="3" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">型号</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 219px;">编号</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 172px;">平台</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">版本</th>
                  </tr>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                  <td>1</td>
                  <td style="padding:1px;"><img style="height:63px;width:63px;"></img></td>
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr></tbody>
              </table>  
            </div>
          </div>
          <ul class="pagination" style="float:right;">
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
</script>