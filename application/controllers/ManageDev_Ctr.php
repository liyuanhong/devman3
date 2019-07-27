<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";
require dirname(__FILE__)."/../libraries/fileupload/UploadHandler.php";

class ManageDev_Ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SearchDev_Mod');
        $this->load->model('UserCenter_Mod');
        $this->load->model('ModifyDev_Mod');

        $this->load->helper('url');
        $this->load->helper('path');
    }

    //修改设备信息
    function modifyDevInfo(){
        $dev_id = get("dev_id",0);
        $type = get("type",0);
        $info = get("val",0);
        $token = get("token",0);

        $result = Array();
        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }

        try{
            $this->ModifyDev_Mod->modifyDevInfo($dev_id,$type,$info);
            $result["status"] = 200;
            $result["message"] = "修改设备信息成功";
        }catch (Exception $e){
            echo 'Message: ' .$e->getMessage();
            $result["status"] = 4003;
            $result["message"] = "修改设备信息失败";
        }
        echo json_encode($result);
    }

    //删除设备图片
    function delDevImgs(){
        $imgs = post("imgs",null);
        $token = post("token",null);
        $dev_id = post("dev_id",null);

        $result = Array();
        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }

        try{
            $counter = count($imgs);
            if($counter != 0){
                foreach($imgs as $delIcon){
                    $img = set_realpath(".")."files/".$delIcon;
                    $thumImg = set_realpath(".")."files/thumbnail/".$delIcon;
                    $img = strtr($img,"\\","/");
                    $thumImg = strtr($thumImg,"\\","/");
                    unlink($img);
                    unlink($thumImg);
                    $this->ModifyDev_Mod->delDevImgsByImg($delIcon);
                }
                $result["status"] = "200";
                $result["message"] = "设备图片删除成功";
                echo json_encode($result);
            }
        }catch (Exception $e){
            echo 'Message: ' .$e->getMessage();
            $result["status"] = "4003";
            $result["message"] = "设备图片删除失败";
            echo json_encode($result);
        }
    }

    //上传设备图片
    function uploadDevImage(){
        $token = get("token",null);
        $path = get("path",null);
        $dev_id = (int)get("dev_id",null);

        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }
        try{
            $upload_handler = new UploadHandler(null,true,null, '/files/');
            $fileName = $upload_handler->theRes["files"][0]->name;
            $this->ModifyDev_Mod->addPicById($dev_id,$fileName);
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
        }
    }

    //删除设备
    function delDevById(){
        $token = get("token",null);
        $dev_id = (int)get("dev_id",null);

        $isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($token));
        if(!$isLogin){
            $result["status"] = "4003";
            $result["message"] = "请登录后再试！";
            echo json_encode($result);
            return;
        }

        try{
            $imgs = $this->SearchDev_Mod->getDevImgsById($dev_id);
            $imgsLen = count($imgs);
            for($i = 0;$i < $imgsLen;$i++){
                $delIcon = $imgs[$i]["path"];
                $img = set_realpath(".")."files/".$delIcon;
                $thumImg = set_realpath(".")."files/thumbnail/".$delIcon;
                $img = strtr($img,"\\","/");
                $thumImg = strtr($thumImg,"\\","/");
                unlink($img);
                unlink($thumImg);
            }
            $this->ModifyDev_Mod->delDevImgsById($dev_id);
            $this->ModifyDev_Mod->delDevById($dev_id);

            $result["status"] = "200";
            $result["message"] = "设备片删除成功";
            echo json_encode($result);
        }catch(Exception $e){
            echo 'Message: ' .$e->getMessage();
            $result["status"] = "4003";
            $result["message"] = "设备片删除失败";
            echo json_encode($result);
        }
    }
}
