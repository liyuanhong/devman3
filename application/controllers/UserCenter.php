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
            exit;
        }
    }
    
    //修改用户基础信息
    public function modifyUserBasicInfo(){
        echo "ok";
    }
}