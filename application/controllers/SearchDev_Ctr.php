<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";

class SearchDev_Ctr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
        $this->load->model('UserCenter_Mod');
        $this->load->model('SearchDev_Mod');
        $this->load->model('ModifyDev_Mod');

    }
    
    //获取要查询的设备信息
    function getDevices(){
        $rowCount = get("rowCount",50);
        $page = get("page",1);
        $result = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        $devs = json_encode($result);
        echo $devs;
    }

    //通过设备的信息搜索设备
    function getDevsByDevInfo(){
        $platefrom = get("platefrom","all");
        $brand = get("brand","all");
        $version = get("version","all");
        $status = get("status","all");
        $category = get("category","all");
        $check_dev = get("check_dev","all");

        $info = array($platefrom,$brand,$version,$status,$category,$check_dev);

        $result = $this->SearchDev_Mod->searchDevsByInfo($info);
        $devs = json_encode($result);
        echo $devs;
    }

    //申请设备
    function applyForDev(){
        $token = get('token','notoken');
        $dev_id = get("devid","0");
        $result = Array();

        try{
            $userInfo = $this->UserCenter_Mod->getUserInfoByToken($token);
            $isLogin = isUserLogin($userInfo);
            if($isLogin){
                $uid = $userInfo[0]["id"];
                $userName = $userInfo[0]["user_name"];

                $this->ModifyDev_Mod->insertApplyInfo($dev_id,$uid,1,0,0,'null','null');
                $this->ModifyDev_Mod->modifyDevStatus($dev_id,1);

                $result["status"] = 200;
                $result["message"] = "设备申请成功";
            }else{
                $result["status"] = 4003;
                $result["message"] = "未登录，请登录";
            }
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
            $result["status"] = 4003;
            $result["message"] = "设备申请失败";
        }
        echo json_encode($result);
    }

    //取消申请设备
    function cancleApplyDev(){
        $token = get('token','notoken');
        $dev_id = get("devid","0");
        $result = Array();

        try{
            $userInfo = $this->UserCenter_Mod->getUserInfoByToken($token);
            $isLogin = isUserLogin($userInfo);
            if($isLogin){
                $uid = $userInfo[0]["id"];
                $userName = $userInfo[0]["user_name"];

                $this->ModifyDev_Mod->deleteApplyInfo($uid,1);
                $this->ModifyDev_Mod->modifyDevStatus($dev_id,0);

                $result["status"] = 200;
                $result["message"] = "设备取消申请成功";
            }else{
                $result["status"] = 4003;
                $result["message"] = "未登录，请登录";
            }
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
            $result["status"] = 4003;
            $result["message"] = "设备取消申请失败";
        }
        echo json_encode($result);
    }
}
