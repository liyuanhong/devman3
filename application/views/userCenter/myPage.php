<?php
/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2018/1/2
 * Time: 下午12:06
 */

$userInfo = $params["userInfo"];

?>
<link rel="stylesheet" href="<?php echo  'http://'.ROOT_URL ?>static/devman3/css/userCenter/myPage.css">
<script src="<?php echo  'http://'.ROOT_URL ?>static/devman3/js/userCenter/mypage.js"></script>

<div class="content-wrapper" style="_background-color: #FFCCCC;">
    <div style="width: 85%;height:300px;_background-color: #999999;position: absolute;">
<!--        <i class="fa fa-fw fa-edit" style="margin-right:100px;margin-top:20px;font-size: 25px;float: right;" onclick="showInfoPanel()"></i>-->
        <div style="width: 90%;height: 200px;margin-left: 5%;_background-color: snow;padding-top: 50px;">
            <div style="padding: 1px;width: 124px;height: 124px;border-style: solid;border-width: 1px;display: inline;float: left;border-color: #9d9d9d;">
<!--                <i class="fa fa-fw fa-edit" style="position: absolute;margin-top: 100px;margin-left: 95px;font-size: 25px;" onclick="showHeadPortraitPanel()"></i>-->
                <img id="head_portrait" src="<?php if($params['userInfo'][0]['icon'] == ""){echo  base_url().'photo/default160.jpg';}else{echo  base_url()."photo/headpic/".$params['userInfo'][0]['icon'];}?>" style="height: 120px;width:120px;_background-color: #9d9d9d;">
            </div>
            <div style="float: left;padding-top: 5px;padding-left: 10px;width: 80%;">
                <label style="font-size: 18px;"><?php echo $userInfo[0]["user_name"]; ?></label>
            </div>
            <div style="float: left;width:80%;">
                <ul id="user_info">
                    <li>角色：<?php if($userInfo[0]["role"] == ""){echo "普通用户";}else{echo $userInfo[0]["role_name"];}?><span>|</span></li>
                    <li>上次登录：<?php if($userInfo[0]["login_time"] == ""){echo "（空）";}else{echo $userInfo[0]["login_time"];}?><span>|</span></li>
                    <li>email：<?php if($userInfo[0]["email"] == ""){echo "（空）";}else{echo $userInfo[0]["email"];}?><span>|</span></li>
                    <li>手机：<?php if($userInfo[0]["mobile"] == ""){echo "（空）";}else{echo $userInfo[0]["mobile"];}?><span>|</span></li>
                    <li>qq：<?php if($userInfo[0]["qq"] == ""){echo "（空）";}else{echo $userInfo[0]["qq"];}?><span>|</span></li>
<!--                    <li>部门：--><?php //if($userInfo[0]["email"] == ""){echo "（空）";}else{echo $userInfo[0]["email"];}?><!--</li>-->
                </ul>
            </div>
            <div style="float: left;margin-left: 10px;width:85%;height: 1px;background-color: red;"></div>
            <div style="float: left;padding-top: 5px;padding-left: 10px;width:80%;">
                <p>个人描述：<?php if($userInfo[0]["comments"] == ""){echo "(空)";}else{echo $userInfo[0]["comments"];}?></p>
            </div>
        </div>
        <div style="width: 90%;height: 200px;margin-left: 5%;background-color: snow;margin-top: 50px;">
        </div>
    </div>
<!--    <div id="modify_head_potrate_panel">-->
<!--        <span class="glyphicon glyphicon-remove closer_icon" onclick="closeHeadPortraitPanel()"></span>-->
<!--        <div style="height:300px;background-color: #00a65a;margin-top: 200px;opacity: 1;"></div>-->
<!--    </div>-->
<!---->
<!--    <div id="modify_info_panel">-->
<!--        <span class="glyphicon glyphicon-remove closer_icon" onclick="closeInfoPanel()"></span>-->
<!--        <div style="height:300px;background-color: red;margin-top: 200px;opacity: 1;"></div>-->
<!--    </div>-->
</div>