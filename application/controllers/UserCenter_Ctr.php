<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/Logs.php";
require dirname(__FILE__)."/../libraries/fileupload/UploadHandler.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";

class UserCenter_Ctr extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('UserCenter_Mod');
        $this->load->model('Logs_Mod');
        $this->load->helper('url');
        $this->load->helper('path');
    }
    
    //注册一个新用户
    public function registerAnUser(){
        $loginName = $_POST["loginname"];
        $userName = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $result = Array();
        
        //$password = md5($password);
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
                
                writeLog($this,$loginName,"成功注册了一个用户！","loginName",0);
                $result = Array();
                $result["status"] = 200;
                $result["message"] = "注册成功！";
                echo json_encode($result);
                //header(base_url()."usercenter/jumptologin");
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
                if($password == $thePassword){
                    $session = time();
                    $token = md5($session);
                    $this->UserCenter_Mod->storeAnToken($loginName,$session,$token);
                    $result["status"] = 200;
                    $result["message"] = "sucess";
                    $result["token"] = $token;
                    writeLog($this,$loginName,"登录了设备管理系统！","loginName",0);
                    echo json_encode($result);
                }else{
                    $result["status"] = 400;
                    $result["message"] = "用户名或密码不正确！";
                    echo json_encode($result);
                }
            }
        }
    }
    
    //处理退出登录请求
    function logoutReq(){
        $logout = $_POST["logout"];
        $token = $_POST["token"];
        $userInfo = $this->UserCenter_Mod->getUserInfoByToken($token);
        $loginName = $userInfo[0]['login_name'];
        writeLog($this,$loginName,"登出系统！","loginName",0);
        
        
        $this->UserCenter_Mod->clearToken($token);
        $result = Array();
        $result["status"] = 200;
        $result["message"] = "退出登陆成功！";
        echo json_encode($result);
    }
    
    //获取登录状态
    function getLoginStatus(){
        $token = $_GET("token");
        $result = $this->UserCenter_Mod->getUserInfoByToken($token);
        $con = conut($result);
        if($con == 0){
            return false;
        }else{
            return true;
        }
    }

    //通过token获取用户信息
    function getUserInfoByToken(){
        $token = get("token","null");
        $result = $this->UserCenter_Mod->getUserInfoByTokenDefaultAnymous($token);

        echo json_encode($result);
    }

    //上传用户头像
    function uploadHeadPic(){
        $token = $_GET["token"];
        //$upload_handler = new UploadHandler($upload_dir = '/photo/headpic/');
        $result = $this->UserCenter_Mod->getUserHeader($token);
        $delIcon = $result[0]["icon"];

        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }

        if($delIcon == null || $delIcon == ""){

        }else{
            $img = set_realpath(".")."photo/headpic/".$delIcon;
            $thumImg = set_realpath(".")."photo/headpic/thumbnail/".$delIcon;
            $img = strtr($img,"\\","/");
            $thumImg = strtr($thumImg,"\\","/");
            unlink($img);
            unlink($thumImg);
        }
        $upload_handler = new UploadHandler(null,true,null, '/photo/headpic/');
        $fileName = $upload_handler->theRes["files"][0]->name;
        $filePath = "photo/headpic/";
        $this->UserCenter_Mod->changeHeaderPic($filePath,$fileName,$token);
    }

    //修改用户信息
    function modifyUserInfo(){
        $token = $_POST["token"];
        $type =$_POST["type"];
        $value = $_POST["value"];
        $result = Array();

        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }

        try{
            $this->UserCenter_Mod->modifyUserInfo($type,$value,$token);
            $result["status"] = 200;
            $result["message"] = "修改用户信息成功";
        }catch (Exception $e){
            //echo 'Message: ' .$e->getMessage();
            $result["status"] = 4004;
            $result["message"] = "修改用户信息失败";
        }
        echo json_encode($result);
    }
}