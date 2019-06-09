<?php
/*
  * 写入到日志：obj为当前写入日志的对象
  * $key可以看做产生日志对应的用户,或者用户的token
  * $action 日志行为，做了什么
  * $way 获取用户信息的方式
  * $type 日志类型，页面访问，还是用户操作
*/

//obj主要用户传入上层控制器对象
//action，传入用户做了什么事情，通常传入一段描述的字符串
//way字段表示获取用户信息的方式，loginName表示通过用户名获取；token表示通过token获取
//type值的含义：0 用户操作 1：页面访问
function writeLog($obj,$key,$action,$way,$type){
    if($way == "loginName"){
        $loginName = $key;
        $info = $obj->UserCenter_Mod->getUserInfoByLoginName($loginName)[0];
        $arr = array();
        $arr['uid'] = $info['id'];
        $arr['user_name'] = $info['user_name'];
        $arr['action'] = $action;
        //type值的含义：0 用户操作 1：页面访问
        $arr['type'] = $type;
        $obj->Logs_Mod->writeLogToDatabase($arr);
    }else if($way == "token"){
        $token = $key;
        $info = $obj->UserCenter_Mod->getUserInfoByToken($token)[0];
        $arr = array();
        $arr['uid'] = $info['id'];
        $arr['user_name'] = $info['user_name'];
        $arr['action'] = $action;
        //type值的含义：0 用户操作 1：页面访问
        $arr['type'] = $type;
        $obj->Logs_Mod->writeLogToDatabase($arr);
    }
}

?>