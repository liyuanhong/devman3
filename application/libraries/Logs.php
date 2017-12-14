<?php 
function writeLog($obj,$login_name,$action){
    $loginName = $login_name;
    $info = $obj->UserCenter_Mod->getUserInfoByLoginName($loginName)[0];
    $arr = array();
    $arr['uid'] = $info['id'];
    $arr['user_name'] = $info['user_name'];
    $arr['action'] = $action;
    //type值的含义：0 用户操作 1：页面访问
    $arr['type'] = 0;
    $obj->Logs_Mod->writeLogToDatabase($arr);
}

?>