<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";

class SearchDev_Ctr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
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
	
}
