<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";

class Welcome extends CI_Controller{
    public $token;
    public $params;
    public $base_url;
    public $site_url;
    public $userInfo;
    public $isLogin;
    
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
        $this->load->model('UserCenter_Mod');
        $this->load->model('Rights_Mod');
        
        $this->params = array();
        $header = getallheaders();
        $this->userAgent = $header["User-Agent"];
        $this->token = get('token','notoken');
        $this->base_url = $this->config->base_url();
        $this->site_url = $this->config->site_url();
        $this->userInfo = $this->UserCenter_Mod->getUserInfoByTokenDefaultAnymous($this->token);
        $this->devDataTotal = $this->SearchDev_Mod->getDataConFromTable(DEVICES_TABLE_NAME)[0]["total"];
        $this->isLogin = isUserLogin($this->UserCenter_Mod->getUserInfoByToken($this->token));
        $this->params['userAgent'] = $this->userAgent;
        $this->params['base_url'] = $this->base_url;
        $this->params['site_url'] = $this->site_url;
        $this->params['userInfo'] = $this->userInfo;
        $this->params['isLogin'] = $this->isLogin;
        $this->params['devDataTotal'] = $this->devDataTotal;

//		echo json_encode(params);
//		exit;
    }
    
    #加载首页
	public function index()
	{
		//用于控制要显示的设备信息列
		$columnCtr = get('showColumn','abcdefgh');
		$rowCount = get("rowCount",50);
		if(is_numeric($rowCount)){}else{$rowCount = 50;}
		$page = get("page",1);
		if(is_numeric($page)){}else{$page = 1;}
		$devs = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        $this->params['pageName'] = HOME_PAGE;
        //获取是否有该页面的操作权限
        $this->params['rights'] = $this->Rights_Mod->getRightsByUid($this->userInfo,SHOW_DEV_PAGE,RIGHTS_PAGE)[0][SHOW_DEV_PAGE];
		$this->params['columnCtr'] = $columnCtr;
		$this->params['devs'] = $devs;
		$this->params['page'] = $page;
		$this->params['rowCount'] = $rowCount;
		$arr = array();
		$arr['params'] = $this->params;
		
		$this->load->view('starter',$arr);
//		echo json_encode($arr);
//		exit;
	}
	
	#显示查看设备页面（与首页同为同一个页面）
	public function showDevs(){
	    //用于控制要显示的设备信息列
	    $columnCtr = get('showColumn','abcdefgh');
	    $rowCount = get("rowCount",50);
	    if(is_numeric($rowCount)){}else{$rowCount = 50;}
	    $page = get("page",1);
	    if(is_numeric($page)){}else{$page = 1;}
	    $devs = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        $this->params['pageName'] = SHOW_DEV_PAGE;
        //获取是否有该页面的操作权限
        $this->params['rights'] = $this->Rights_Mod->getRightsByUid($this->userInfo,SHOW_DEV_PAGE,RIGHTS_PAGE)[0][SHOW_DEV_PAGE];
        $this->params['columnCtr'] = $columnCtr;
	    $this->params['devs'] = $devs;
	    $this->params['page'] = $page;
	    $this->params['rowCount'] = $rowCount;
	    $arr = array();
	    $arr['params'] = $this->params;
	    $this->load->view('starter',$arr);
	}
	
	//注册页面
	public function registAnUser(){
	    $this->load->view('userCenter/register');
	}
	//登陆页面
	public function login(){
	    $this->load->view('userCenter/login');
	}
	//注册后的跳转页面
	public function jumpToLogin(){
	    $this->load->view('userCenter/jumpToLogin');
	}
}
