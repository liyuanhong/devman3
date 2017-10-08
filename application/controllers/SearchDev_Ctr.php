<?php

class SearchDev_Ctr extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
    }
    
    //获取要查询的设备信息
    function getDevices(){
        $result = $this->SearchDev_Mod->getAllDevs();
        $devs = json_encode($result);
        echo $devs;
    }
	
}
