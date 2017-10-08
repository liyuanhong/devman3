<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller{

    #加载首页
	public function index()
	{
		#$this->load->view('welcome_message');
		$this->load->view('starter');

	}
}
