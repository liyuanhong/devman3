<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
}
