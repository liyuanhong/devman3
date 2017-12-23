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
	
}
