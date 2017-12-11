<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";

class Welcome extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('SearchDev_Mod');
    }
    

    #加载首页
	public function index()
	{
		#$this->load->view('welcome_message');
		$this->load->view('starter');
	}
	
	#显示查看设备页面（与首页同为同一个页面）
	public function showDevs(){
	    $this->load->view('starter');
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
