<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";

class UserCenter extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('UserCenter_Mod');
    }
    
    //注册一个新用户
    public function registerAnUser(){
        $loginName = $_POST["loginName"];
        $userName = $_POST["userName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = Array();
        
        $password = md5($password);
        $users = $this->UserCenter_Mod->getLoginNames();
        $isExist = in_array($loginName,$users);
        if($isExist){
            $result["status"] = 400;
            $result["message"] = "用户已经存在！";
            echo json_encode($result);
        }else{
            if(strlen($loginName) == 0 || $loginName == ""){
                $result["status"] = 400;
                $result["message"] = "登陆名不能为空！";
                echo json_encode($result);
            }else{
                $result = $this->UserCenter_Mod->createAnUserToDatabase($loginName,$userName,$email,$password);
                //             $result["status"] = 200;
                //             $result["message"] = "注册成功！";
                //             echo json_encode($result);
                header("location: http://".rootUrl."index.php/welcome/jumpToLogin");
            }
        }
    }
    
    //修改用户基础信息
    public function modifyUserBasicInfo(){
        echo "ok";
    }
    
    //处理登录请求
    function loginReq(){
        $loginName = $_POST["loginName"];
        $password = $_POST["password"];
        $result = Array();
        if($password == "d41d8cd98f00b204e9800998ecf8427e"){
            $result["status"] = 400;
            $result["message"] = "密码不能为空！";
            echo json_encode($result);
        }else{
            $thePassword = $this->UserCenter_Mod->getLoginPassword($loginName);
            if($thePassword == ""){
                $result["status"] = 400;
                $result["message"] = "数据库密码异常！";
                echo json_encode($result);
            }else{
                echo $thePassword;
            }
        }
    }
}