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
    <link rel="stylesheet" href="<?php echo  base_url(); ?>static/fileupload/css/style.css">
    <link rel="stylesheet" href="<?php echo  base_url(); ?>static/fileupload/css/jquery.fileupload.css">
    <script src="<?php echo  base_url(); ?>static/fileupload/js/vendor/jquery.ui.widget.js"></script>
    <script src="<?php echo  base_url(); ?>static/fileupload/js/jquery.iframe-transport.js"></script>
    <script src="<?php echo  base_url(); ?>static/fileupload/js/jquery.fileupload.js"></script>
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
        <div style="padding-bottom:80px;">
            <div style="width:100%;margin:auto;_background: yellow;padding-top:50px;">
                <table style="width:70%;margin:auto;">
                    <tbody>
                    <tr>
                        <td><label style="float:left;margin-left:5px;" val='<?php echo $defInfo[0]["id"]?>' id="dev_id">id：<?php echo $defInfo[0]["id"]?></label></td>
                        <td>
                            <label style="float:left;margin-left:5px;">设备名：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="device_name" type="text" class="form-control" value="<?php echo $defInfo[0]["device_name"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">型&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="model" type="text" class="form-control" value="<?php echo $defInfo[0]["model"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="float:left;margin-left:5px;">平&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;台：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="plateform" type="text" class="form-control" value="<?php echo $defInfo[0]["plateform"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牌：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="brand" type="text" class="form-control" value="<?php echo $defInfo[0]["brand"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">版&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="version" type="text" class="form-control" value="<?php echo $defInfo[0]["version"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>id="comments"
                            <label style="float:left;margin-left:5px;">所有者：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="owner" type="text" class="form-control" value="<?php echo $defInfo[0]["owner"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                        <td>
                            <label style="float:left;margin-left:5px;">借阅者：</label>
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input id="borrower" type="text" class="form-control" value="<?php echo $defInfo[0]["borrower"]; ?>" disabled="true">
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label style="float:left;margin-left:5px;">描&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;述：</label>
                            <div class="input-group input-group-sm">
                                <textarea style="width:700px;display: inline;" class="form-control" rows="3" placeholder="请输入个人描述" disabled="true"><?php echo $defInfo[0]["comments"]; ?></textarea>
                                <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-comments" onclick="editDev(this)">编辑</button></span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--    设备大图显示    -->
            <?php if(count($defInfo[0]["imgs"]) != 0): ?>
                <div style="width:50%;margin:auto;_background: yellow;">
                    <div class="box-body" style="_background: lightblue;">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for($i = 0;$i < count($defInfo[0]["imgs"]);$i++): ?>
                                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if($i == 0){echo 'class="active"';}else{echo 'class=""';}?> ></li>
                                <?php endfor; ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php for($i = 0;$i < count($defInfo[0]["imgs"]);$i++): ?>
                                    <div <?php if($i == 0){echo 'class="item active"';}else{echo 'class="item"';}?>>
                                        <img style="height:550px;margin:auto;" src="<?php echo  base_url()."files/".$defInfo[0]["imgs"][$i]["path"]; ?>" alt="">

                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!--    设备大图显示 end    -->
            <!--    设备缩略图的显示    -->
            <div style="width:100%;height:120px;_background-color:yellow;_margin-top:20px;">
                <div style="width:500px;margin:auto;_background-color:green;height:120px;">
                    <style type="text/css">
                        #dev_pic {
                            list-sytle:none;
                            display:inline;
                        }
                        #dev_pic li {
                            list-style: none;
                            display:inline;
                            margin-left:10px;
                        }
                        #dev_pic li img:hover{
                            cursor:pointer;
                            border-style:solid;
                            border-width:2px;
                            border-color:orange;
                            height:80px;
                        }
                    </style>
                    <?php if(count($defInfo[0]["imgs"]) == 0): ?>
                        <h3>还没有上传设备图片哦(✪ω✪)</h3>
                    <?php else: ?>
                        <ul id="dev_pic">
                            <H5><b>设备图片如下：</b></H5>
                            <?php for($i = 0;$i < count($defInfo[0]["imgs"]);$i++): ?>
                                <li>
                                    <img val="<?php echo $defInfo[0]['imgs'][$i]['path']; ?>" sta="0" src="<?php echo  'http://'.ROOT_URL.'files/thumbnail/'.$defInfo[0]['imgs'][$i]['path']; ?>" onclick="picSelect(this)">
                                </li>
                            <?php  endfor; ?>
                        </ul>
                    <?php  endif; ?>
                    <button id="delButton" type="button" class="btn btn-block btn-danger btn-sm" style="width:80px;display:none;margin-left:20px;" onclick="delDevImgs(this)">删除图片</button>
                </div>
            </div>
            <!--    设备缩略图的显示 end    -->
            <!--      图片上传 start      -->
            <div style="width:100%;min-height:140px;_background-color:yellow;margin-top:20px;">
                <div style="width:50%;_background:pink;margin:auto;">
                    <div style="_background: palevioletred;width:80%;height: 100px;float:left;padding:5px;margin-left: 20px;">
                        <h4><b>上传设备图片：</b></h4>
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>选择图片</span>
                            <input id="fileupload" type="file" name="files[]" multiple>
                        </span>
                        <br>
                        <br>
                        <div id="progress" class="progress">
                            <div class="progress-bar progress-bar-success"></div>
                        </div>
                        <div id="files" class="files"></div>
                        <br>
                    </div>
                </div>
            </div>
            <!--      图片上传 end     -->
            <!--      删除设备 start      -->
            <div style="width:100%;min-height:140px;_background-color:yellow;margin-top:20px;">
                <div style="width:50%;_background:pink;margin:auto;padding-left:20px;">
                    <button type="button" class="btn btn-block btn-danger btn-sm" style="width:80px;" onclick="delDevById()">删除设备</button>
                </div>
            </div>
            <!--      删除设备 end      -->
        </div>
    </div>


    <script type="text/javascript">
        //为文件上传添加事件
        uploadHeadPic();    //devman3/js/editdev.js
    </script>
<?php endif; ?>