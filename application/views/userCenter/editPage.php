<?php
/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2018/1/2
 * Time: 下午12:06
 */

$userInfo = $params["userInfo"];

?>
<link rel="stylesheet" href="<?php echo  base_url(); ?>static/fileupload/css/style.css">
<link rel="stylesheet" href="<?php echo  base_url(); ?>static/fileupload/css/jquery.fileupload.css">
<script src="<?php echo  base_url(); ?>static/fileupload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo  base_url(); ?>static/fileupload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo  base_url(); ?>static/fileupload/js/jquery.fileupload.js"></script>
<script src="<?php echo  base_url(); ?>static/devman3/js/userCenter/editPage.js"></script>
<style type="text/css">
    #user_info li {
        border-bottom: 0px;
        border-bottom-style: solid;
        border-bottom-color: gray;
        padding:5px;
    }
</style>

<div class="content-wrapper" style="_background-color: #FFCCCC;">
    <div style="_background-color: hotpink;width:70%;padding-bottom: 30px;">
        <ul style="margin-left: 125px;list-style:none;" id="user_info">
            <li style="height:150px;">
                <!--      修改头像 start          -->
                <div>
                    <h4>修改头像：</h4>
                    <div style="width:110px;height:110px;_background: yellowgreen;border: 1px;border-color: lightgray;border-style: solid;float:left;padding: 5px;">
                        <img id="headpic" style="height:100px;width:100px;" src="<?php if($params['userInfo'][0]['icon'] == ""){echo  base_url().'photo/default160.jpg';}else{echo  base_url()."photo/headpic/".$params['userInfo'][0]['icon'];}?>">
                    </div>
                    <div style="_background: palevioletred;width:80%;height: 100px;float:left;padding:5px;margin-left: 20px;">
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
                <!--      修改头像 end          -->
            </li>
            <li>
                <div>
                    <h4>修改用户名：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["user_name"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-user_name" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改昵称：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["login_name"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-login_name" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改性别：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["gender"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-gender" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改年龄：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["age"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-age" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改手机号：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["mobile"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-user_mobile" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改邮箱：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["email"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-email" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改QQ：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["qq"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-qq" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改工号：</h4>
                    <div class="input-group input-group-sm" style="width:500px;">
                        <input type="text" class="form-control" value="<?php echo $userInfo[0]["work_num"]; ?>" disabled="true">
                        <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-word_num" onclick="modifyUserInfo(this)">编辑</button></span>
                    </div>
                </div>
            </li>
            <li>
                <div>
                    <h4>修改个人描述：</h4>
                    <textarea style="width:500px;display: inline;" class="form-control" rows="3" placeholder="请输入个人描述" disabled="true"><?php echo $userInfo[0]["comments"]; ?></textarea>
                    <span class="input-group-btn"><button type="button" class="btn btn-info btn-flat" tag="modify-comments" onclick="modifyUserInfo(this)">编辑</button></span>
                </div>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript">
    //为文件上传添加事件
    uploadHeadPic();    //devman3/js/editPage.js
</script>