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
        $this->token = get('token','notoken');
        $this->params = array();
        $this->base_url = $this->config->base_url();
        $this->site_url = $this->config->site_url();
        $this->userInfo = $this->UserCenter_Mod->getUserInfoByToken($this->token);
        $this->isLogin = isUserLogin($this->userInfo);
        $this->params['base_url'] = $this->base_url;
        $this->params['site_url'] = $this->site_url;
        $this->params['userInfo'] = $this->userInfo;
        $this->params['isLogin'] = $this->isLogin;
    }
    

    #加载首页
	public function index()
	{
		//用于控制要显示的设备信息列
		$columnCtr = get('showColumn','abcdefgh');
		$devs = $this->SearchDev_Mod->getAllDevs();
		$this->params['columnCtr'] = $columnCtr;
		$this->params['devs'] = $devs;
		$arr = array();
		$arr['params'] = $this->params;
		
// 		print_r($this->params['userInfo']);
// 		exit;
		$this->load->view('starter',$arr);
	}
	
	#显示查看设备页面（与首页同为同一个页面）
	public function showDevs(){
	    //用于控制要显示的设备信息列
	    $columnCtr = get('showColumn','abcdefgh');
	    $devs = $this->SearchDev_Mod->getAllDevs();
	    $this->params['columnCtr'] = $columnCtr;
	    $this->params['devs'] = $devs;
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
