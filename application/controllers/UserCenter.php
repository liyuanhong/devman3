<?php
/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2018/1/2
 * Time: 下午6:36
 */
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";
require dirname(__FILE__)."/../libraries/Logs.php";

class UserCenter extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
        $this->load->model('UserCenter_Mod');
        $this->load->model('Rights_Mod');
        $this->load->model('Logs_Mod');
        $this->load->model('Statistic_Mod');
        $this->load->model('DevAttrs_Mod');


        $this->params = array();
        $header = getallheaders();
        $this->userAgent = $header["User-Agent"];
        $this->token = get('token','notoken');
        $this->base_url = $this->config->base_url();
        $this->site_url = $this->config->site_url();
        $this->userInfo = $this->UserCenter_Mod->getUserInfoByTokenDefaultAnymous($this->token);
        $this->isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($this->token));
        $this->params['userAgent'] = $this->userAgent;
        $this->params['base_url'] = $this->base_url;
        $this->params['site_url'] = $this->site_url;
        $this->params['userInfo'] = $this->userInfo;
        $this->params['isLogin'] = $this->isLogin;
//        $this->params['devDataTotal'] = $this->devDataTotal;

//		echo json_encode($this->params);
//		exit;

    }

    //访问我的页面
    public function myPage(){
        //用于控制要显示的设备信息列
        $page = get("page",1);
        if(is_numeric($page)){}else{$page = 1;}
        $this->params['pageName'] = USERCENTER_MY_PAGE;
        //获取是否有该页面的操作权限
        $this->params['rights'] = $this->Rights_Mod->getRightsByUid($this->userInfo,SHOW_DEV_PAGE,RIGHTS_PAGE);
        $this->params['page'] = $page;
        $this->params['userInfo'] = $this->UserCenter_Mod->getUserInfoByTokenDefaultAnymous($this->token);
        $arr = array();
        $arr['params'] = $this->params;

//        echo json_encode($this->params);
//		exit;

        //写入日志
        writeLog($this,$this->userInfo[0]['login_name'],"访问了我的页面！","loginName",1);
        //进行页面访问统计
        $this->Statistic_Mod->insertStatisticInfo($this->userInfo,HOME_PAGE);
        $this->load->view('starter',$arr);

    }
}