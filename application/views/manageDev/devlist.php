<?php
//返回的设备信息
$result = $params['devs'];
$devs = $result;
// $devNum = count($devs);
//显示列的行号
$rowNumber = 1;
//用于控制要显示的设备信息列
$showColumn = $params['columnCtr'];
$columnCtr = strToArray($showColumn);
//总共的设备数
$devDataTotal = $params['devDataTotal'];
//第几页
$page = $params['page'];
//每页显示的行数
$rowCount = $params['rowCount'];
$totalPage = intval($devDataTotal / $rowCount) + 1;
//获取设备的属性
$attrs = $params['attrs'];
//获取历史查询的info信息
if(array_key_exists("info",$params)){
    $info = $params["info"];
}else{
    $info = array();
    $info["plateform"] = "all";
    $info["brand"] = "all";
    $info["version"] = "all";
    $info["status"] = "all";
    $info["category"] = "all";
    $info["check_dev"] = "all";
}
//获取历史查询的关键字搜索词
if(array_key_exists("keyword",$params)){
    $keyword = $params["keyword"];
}else{
    $keyword = "";
}
//获取历史查询的关键字搜索词
if(array_key_exists("baseon",$params)){
    $baseon = $params["baseon"];
}else{
    $baseon = "设备名";
}
//获取历史查询的关键字搜索词
if(array_key_exists("rule",$params)){
    $rule = $params["rule"];
}else{
    $rule = "等于";
}
//获取历史查询的关键字搜索词
if(array_key_exists("scope",$params)){
    $scope = $params["scope"];
}else{
    $scope = "";
}
?>

<?php if(strpos($params["userAgent"],"Mobile") === false){?>
    <link rel="stylesheet" href="<?php echo  base_url(); ?>static/devman3/css/manageDev/show_devs.css">
<?php }else{?>
    <!-- 如果是手机用户，则返回手机端的css -->
    <link rel="stylesheet" href="<?php echo  base_url(); ?>static/devman3/css/manageDev/show_devs_mobile.css">
<?php }?>

<link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo  base_url(); ?>static/bower_components/select2/dist/css/select2.min.css">
<script src="<?php echo  base_url(); ?>static/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo  base_url(); ?>static/devman3/js/manageDev/devlist.js"></script>

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo  base_url(); ?>static/plugins/iCheck/all.css">


<div id="show_devs_containt_view" class="content-wrapper">
  <div id="show_devs_top_control">
    <div id="classification">
        <label>类型:</label>
        <select class="form-control" id="classification_ctrl" style="width:120px;height:30px;display: inline;margin-left: 10px;" onchange="switchDevType()">
            <option value="1">手机平板</option>
            <option value="2">电脑</option>
            <option value="3">显示器</option>
            <option value="4">办公用品</option>
            <option value="5">桌椅</option>
        </select>
    </div>
        <div id="show_devs_phones_control" style="width: 88%;height: 200px;background:transparent;float:right;display:inline;">
            <div class="col-md-3 col-sm-4 search-item">平台：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="plateform">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_platform"]);$i++) {?>
                        <option <?php if($info['plateform'] == $attrs['type_platform'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_platform"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">品牌：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="brand">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_brand"]);$i++) {?>
                    <option <?php if($info['brand'] == $attrs['type_brand'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_brand"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">系统：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="sys_version">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_system"]);$i++) {?>
                        <option <?php if($info['version'] == $attrs['type_system'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_system"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">状态：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="status">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_status"]);$i++) {?>
                        <option <?php if($info['status'] == $attrs['type_status'][$i]){echo 'selected = "selected"';}?> ><?php echo $attrs["type_status"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">分类：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="category">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_category"]);$i++) {?>
                        <option <?php if($info['category'] == $attrs['type_category'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_category"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">盘点：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="check_dev">
                    <option>all</option>
                    <?php for($i = 0;$i < count($attrs["type_check"]);$i++) {?>
                        <option <?php if($info['check_dev'] == $attrs['type_check'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_check"][$i]; ?></option>
                    <?php }?>
                </select>
              </div>
            <div class="col-md-3 col-sm-4 search-item">
                <button type="button" class="btn btn-block btn-primary btn-sm" style="width:145px;" onclick="searchByInfo()">查询</button>
              </div>
            <div class="input-group input-group-sm" style="margin-left: 10px;padding-top: 15px;">
                <input type="text" class="form-control" style="width: 250px;" id="keyword" value="<?php echo $keyword;?>">
                    <span class="input-group-btn" style="display: block;float: left;">
                      <button type="button" class="btn btn-info btn-flat" onclick="searchByKeyword()">关键字搜索</button>
                    </span>
              </div>
            <div style="margin-left: 10px;padding-top: 15px;">单项搜索：
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="my_baseon" value="<?php echo $baseon; ?>" >
                    <option <?php if($baseon == "设备名"){echo 'selected = "selected"';} ?>>设备名</option>
                    <option <?php if($baseon == "型号"){echo 'selected = "selected"';} ?>>型号</option>
                    <option <?php if($baseon == "编号"){echo 'selected = "selected"';} ?>>编号</option>
                    <option <?php if($baseon == "平台"){echo 'selected = "selected"';} ?>>平台</option>
                    <option <?php if($baseon == "版本"){echo 'selected = "selected"';} ?>>版本</option>
                    <option <?php if($baseon == "签借人"){echo 'selected = "selected"';} ?>>签借人</option>
                    <option <?php if($baseon == "所属"){echo 'selected = "selected"';} ?>>所属</option>
                </select>
                <select class="form-control" style="width:100px;height:30px;display: inline;" id="my_rule" onchange="changePlaceholder()" value="<?php echo $rule; ?>">
                    <option <?php if($rule == "等于"){echo 'selected = "selected"';} ?>>等于</option>
                    <option <?php if($rule == "包含"){echo 'selected = "selected"';} ?>>包含</option>
                    <option <?php if($rule == "介于"){echo 'selected = "selected"';} ?>>介于</option>
                    <option <?php if($rule == "大于"){echo 'selected = "selected"';} ?>>大于</option>
                    <option <?php if($rule == "小于"){echo 'selected = "selected"';} ?>>小于</option>
                    <option <?php if($rule == "不等于"){echo 'selected = "selected"';} ?>>不等于</option>
                    <option <?php if($rule == "不包含"){echo 'selected = "selected"';} ?>>不包含</option>
                </select>
                <input class="form-control select_style" placeholder="搜索词" style="width:200px;display:inline;height: 30px;" id="my_scope" value="<?php echo $scope; ?>">
                <button type="button" class="btn btn-primary btn-sm" style="width:60px;margin-bottom: 4px;" onclick="searchByScope()">搜索</button>
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
                            <label style="margin-bottom: 0px;">展示
                                <select name="example1_length" aria-controls="example1" id="dataCtr" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                    <option value="500">500</option>
                                </select> 行
                            </label>
                        </div>
                    </div>
                </div>
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
                                </ins>
                            </div>型号
                            </label>
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
                                </div>操作</label>
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
                        </td><td style="_display: none;">
                            <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut9" value="status" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>状态</label>
                        </td></tr>
                                <tr><td style="_display: none;">
                                        <label class="" onclick="dealColumnClick(this)">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="checkbox" id="checkBut10" value="comments" class="flat-red" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>备注</label>
                        </td></tr>
                    </table>
                     <button type="button" class="btn btn-block btn-primary btn-sm" style="width:60px;margin-top: 10px;" onclick="confirmColumn()">确定</button>
                 </div>
                </div>
            </ul>
        </div>
      <!-- 表格列控制end -->
            <!-- 设备表格区域start -->
            <div class="row" style="margin-left: 0px;margin-right: 0px;">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                        <thead>
                        <tr role="row" style="height:30px;">
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 20px;">#</th>
                            <th class="noafter sorting"><label style="width: 70px;margin-bottom: 0px;">图片</label></th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 201px;">设备名</th>
                            <?php if(hasArrValue($columnCtr,"a")){echo '
                          <th class="sorting" tabindex="3" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 246px;">型号</th>
                          ';}if(hasArrValue($columnCtr,"b")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 219px;">编号</th>
                          ';}if(hasArrValue($columnCtr,"c")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 165px;">平台</th>
                          ';}if(hasArrValue($columnCtr,"d")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 119px;">版本</th>
                          ';}if(hasArrValue($columnCtr,"e")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">签借人</th>
                          ';}if(hasArrValue($columnCtr,"f")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">操作</th>
                          ';}if(hasArrValue($columnCtr,"g")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 126px;">所属</th>
                          ';}if(hasArrValue($columnCtr,"h")){echo '
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 155px;">借出时间</th>
                          ';} ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($devs as $dev){?>
                            <tr role="row" class="odd" devid="<?php echo $dev->id; ?>">
                                <td><?php echo $rowNumber++;?></td>
                                <td style="padding:1px;cursor:pointer;" onclick="jumToEditdev(this)"><div style="height:63px;width:63px;"><img style="height: 63px;" src="<?php echo 'http://'.HOST.'/devman3/files/thumbnail/'.trim($dev->path);?>"/></div></td>
                                <td style="cursor:pointer;" onclick="jumToEditdev(this)" class="sorting_1"><?php echo $dev->device_name;?></td>
                                <?php if(hasArrValue($columnCtr,"a")){echo '
                                  <td>'.$dev->model.'</td>
                                  ';}if(hasArrValue($columnCtr,"b")){echo '
                                  <td>'.$dev->theNum.'</td>
                                  ';}if(hasArrValue($columnCtr,"c")){echo '
                                  <td>'.$dev->plateform.'</td>
                                  ';}if(hasArrValue($columnCtr,"d")){echo '
                                  <td>'.$dev->version.'</td>
                                  ';}if(hasArrValue($columnCtr,"e")){echo '
                                  <td>'.$dev->borrower.'</td>
                                  ';}if(hasArrValue($columnCtr,"f")){echo '
                                  <td><button type="button" class="btn btn-block btn-success btn-sm" style="width:70px;margin:auto;" onclick="jumToEditdev1(this)">管理设备</button></td>
                                  ';}if(hasArrValue($columnCtr,"g")){echo '
                                  <td>'.$dev->owner.'</td>
                                  ';}if(hasArrValue($columnCtr,"h")){echo '
                                  <td>'.$dev->borrow_time.'</td>
                                  ';} ?>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- 设备表格区域end -->
            <!--  翻页区域  start -->
            <ul class="pagination" style="float:right;margin-top: 15px;margin-right: 15px;" id="pageButtonContent">
                <li class="paginate_button previous disabled" id="example1_previous">
                    <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" style="cursor:pointer;"><<</a>
                </li>
                <?php if($totalPage <= 5 && $page <= $totalPage){for($i = 1;$i <= $totalPage;$i++){?>
                    <li class="<?php if($page == $i){echo 'paginate_button active';}else{echo 'paginate_button';}?>"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>
                <?php }}else if($page == 1){?>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 1;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 2;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 3;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $totalPage;?></a></li>
                <?php }else if($page == $totalPage){?>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 3;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 2;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 1;?></a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                <?php }else if($page == $totalPage - 1){?>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 2;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 1;?></a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $totalPage;?></a></li>
                <?php }else if($page == $totalPage - 2){?>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page - 1;?></a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 1;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $totalPage;?></a></li>
                <?php }else if($page < $totalPage - 2){?>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 1;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page + 2;?></a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $totalPage;?></a></li>
                <?php }else if($page > $totalPage){?>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $totalPage;?></a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0"><?php echo $page;?></a></li>
                <?php }?>
                <li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">>></a></li>
            </ul>
            <!--  翻页区域  end -->
        </div>
    </div>
</div>
