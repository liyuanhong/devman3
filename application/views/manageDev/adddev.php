<?php
//获取设备的属性
$attrs = $params['attrs'];

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
?>

<style type="text/css">
    table tbody tr td {
        border-style: solid;
        border-width: 1px;
        padding:2px;
        padding-top:10px;
        padding-bottom: 10px;
    }
    table tbody tr td label {
        font-size: 16px;
    }
</style>

<script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/manageDev/adddev.js"></script>

<div class="content-wrapper" style="_background-color: #FFCCCC;">
    <div style="margin-top:0px;width:100%;_background:pink;min-height:150px;padding-top:40px;">
        <table style="width:80%;margin:auto;">
            <tr>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;;">
                        <label style="width:100px;float:left;padding-left:10px;">设备名：</label>
                        <input id="device_name" type="text" class="form-control" style="display:inline;width:80%">
                    </div>
                </td>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;">
                        <label style="width:100px;float:left;padding-left:10px;">型号：</label>
                        <input id="model" type="text" class="form-control" style="display:inline;width:80%">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;;">
                        <label style="width:100px;float:left;padding-left:10px;">平台：</label>
                        <select class="form-control" style="display:inline;width:80%" id="plateform">
                            <option>all</option>
                            <?php for($i = 0;$i < count($attrs["type_platform"]);$i++) {?>
                                <option <?php if($info['plateform'] == $attrs['type_platform'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_platform"][$i]; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;">
                        <label style="width:100px;float:left;padding-left:10px;">品牌：</label>
                        <select class="form-control" style="display:inline;width:80%" id="brand">
                            <option>all</option>
                            <?php for($i = 0;$i < count($attrs["type_brand"]);$i++) {?>
                                <option <?php if($info['brand'] == $attrs['type_brand'][$i]){echo 'selected = "selected"';}?>><?php echo $attrs["type_brand"][$i]; ?></option>
                            <?php }?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;;">
                        <label style="width:100px;float:left;padding-left:10px;">系统版本：</label>
                        <input id="version" type="text" class="form-control" style="display:inline;width:80%">
                    </div>
                </td>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;">
                        <label style="width:100px;float:left;padding-left:10px;">所有者：</label>
                        <input id="owner" type="text" class="form-control" style="display:inline;width:80%">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="input-group input-group-sm" style="width:95%;;">
                        <label style="width:100px;float:left;padding-left:10px;">描述：</label>
                        <input id="comments" type="text" class="form-control" style="display:inline;width:80%">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-group input-group-sm" style="width:95%;;">
                        <label style="width:100px;float:left;padding-left:10px;">类型：</label>
                        <select id="dev_type" class="form-control" id="classification_ctrl" style="display:inline;width:80%" onchange="switchDevType()">
                            <?php for($i = 0;$i < count($params["dev_type"]);$i++): ?>
                                <option value="<?=$params["dev_type"][$i]["type_id"]?>"><?=$params["dev_type"][$i]["type_detail"]?></option>
                            <?php endfor;?>
                        </select>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div style="margin-top:0px;width:100%;_background:pink;padding-top:40px;">
        <button type="button" class="btn btn-block btn-success btn-lg" style="width:150px;margin:auto;margin-top:30px;" onclick="addDev()">添加设备</button>
    </div>
</div>
