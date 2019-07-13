<?php
$defInfo = $params["defInfo"];
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

    <script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/manageDev/editdev.js"></script>
<?php if(count($defInfo) == 0): ?>
    <div class="content-wrapper" style="_background-color: #FFCCCC;">
        <div style="width:100%;_background: #00c0ef;padding-top:200px;">
            <div style="margin:auto;width:200px;">
                <h3 style="margin-top:0px;display: inline;">没有选择任何设备</h3>
                <button type="button" class="btn btn-block btn-success" style="width:auto;margin:auto;margin-top:30px;" onclick="jumpToDevlist()">返回设备列表</button>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="content-wrapper" style="_background-color: #FFCCCC;">
        <div style="width:100%;margin:auto;_background: yellow;padding-top:50px;">
            <table style="width:70%;margin:auto;">
                <tbody>
                    <tr>
                        <td><label style="float:left;margin-left:5px;">id：<?php echo $defInfo[0]["id"]?></label></td>
                        <td>
                            <label style="float:left;margin-left:5px;">设备名：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["device_name"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">型&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["model"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="float:left;margin-left:5px;">平&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;台：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["plateform"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牌：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["brand"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">版&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["version"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="float:left;margin-left:5px;">所有者：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["owner"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">借阅者：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control" value="<?php echo $defInfo[0]["borrower"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label style="float:left;margin-left:5px;">描&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</label>
                            <div class="input-group input-group-sm">
                                <textarea style="width:700px;display: inline;" class="form-control" rows="3" placeholder="请输入个人描述" disabled="true"><?php echo $defInfo[0]["comments"]; ?></textarea>
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-comments" onclick="modifyUserInfo(this)">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>