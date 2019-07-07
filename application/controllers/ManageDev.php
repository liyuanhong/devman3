<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";
require dirname(__FILE__)."/../libraries/UserCenter_Util.php";
require dirname(__FILE__)."/../libraries/Logs.php";

class ManageDev extends CI_Controller{
    public $token;
    public $params;
    public $base_url;
    public $site_url;
    public $userInfo;
    public $isLogin;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SearchDev_Mod');
        $this->load->model('UserCenter_Mod');
        $this->load->model('Rights_Mod');
        $this->load->model('Logs_Mod');
        $this->load->model('Statistic_Mod');
        $this->load->model('DevAttrs_Mod');
        $this->load->helper('url');

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

//		echo json_encode(params);
//		exit;
    }

    public function devList(){
        $plateform = get("plateform","all");
        $brand = get("brand","all");
        $version = get("version","all");
        $status = get("status","all");
        $category = get("category","all");
        $check_dev = get("check_dev","all");
        $info = array();
        $info["plateform"] = $plateform;
        $info["brand"] = $brand;
        $info["version"] = $version;
        $info["status"] = $status;
        $info["category"] = $category;
        $info["check_dev"] = $check_dev;

        $keyword = get("keyword","");
        $baseon = get("baseon","device_name");
        $rule = get("rule","等于");
        $scope = get("scope","");

        //用于控制要显示的设备信息列
        $columnCtr = get('showColumn','abcdefgh');
        $rowCount = get("rowCount",50);
        if(is_numeric($rowCount)){}else{$rowCount = 50;}
        $page = get("page",1);
        if(is_numeric($page)){}else{$page = 1;}
        //$devs = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        $searchResult = self::searchDevsByParams($rowCount,$page);
        $devs = $searchResult["devs"];
        $this->params['pageName'] = SHOW_DEV_PAGE;
        //获取是否有该页面的操作权限
        $this->params['rights'] = $this->Rights_Mod->getRightsByUid($this->userInfo,SHOW_DEV_PAGE,RIGHTS_PAGE);
        $this->params['columnCtr'] = $columnCtr;
        $this->params['attrs'] = $this->DevAttrs_Mod->getMobileAttrs();
        $this->params['info'] = $info;
        $this->params['devs'] = $devs;
        $this->params['devDataTotal'] = $searchResult["total"];
        $this->params['keyword'] = $keyword;
        $this->params['baseon'] = $baseon;
        $this->params['rule'] = $rule;
        $this->params['scope'] = $scope;
        $this->params['page'] = $page;
        $this->params['rowCount'] = $rowCount;
        $arr = array();
        $arr['params'] = $this->params;

        $this->load->view('starter',$arr);

    }





















    //通过传输的参数来查询设备
    private function searchDevsByParams($rowCount,$page){
        $rowCount = get("rowCount",50);
        $plateform = get("plateform","all");
        $brand = get("brand","all");
        $version = get("version","all");
        $status = get("status","all");
        $category = get("category","all");
        $check_dev = get("check_dev","all");
        $searchType = get("searchType","");

        if($status == "未借出"){
            $status = 0;
        }else if($status == "申请中"){
            $status = 1;
        }else if($status == "已借出"){
            $status = 2;
        }else{
            $status = "all";
        }

        $info = array();
        $info["plateform"] = $plateform;
        $info["brand"] = $brand;
        $info["version"] = $version;
        $info["status"] = $status;
        $info["category"] = $category;

        if($check_dev == "未盘点"){
            $check_dev = 0;
            $info["check_dev"] = $check_dev;
        }else if($check_dev == "已盘点"){
            $check_dev = 1;
            $info["check_dev"] = $check_dev;
        }else if($check_dev == "丢失"){
            $old_dev = 2;
            $info["old_dev"] = $old_dev;
        }{
            $check_dev = "all";
            $info["check_dev"] = $check_dev;
        }

        $devs = Null;
        if($searchType == ""){
            $devs = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        }else if($searchType == "info"){
            $devs = $this->SearchDev_Mod->searchDevsByInfo($info,$rowCount,$page);
        }else if($searchType == "keyword"){
            $keyword = get("keyword","");
            $devs = $this->SearchDev_Mod->searchDevsByKeyword($keyword,$rowCount,$page);
        }else if($searchType == "scope"){
            $baseon = get("baseon","device_name");
            $rule = get("rule","等于");
            $scope = get("scope","");
            if($baseon == "设备名"){
                $baseon = "device_name";
            }else if($baseon == "型号"){
                $baseon = "model";
            }else if($baseon == "编号"){
                $baseon = "theNum";
            }else if($baseon == "平台"){
                $baseon = "plateform";
            }else if($baseon == "版本"){
                $baseon = "version";
            }else if($baseon == "签借人"){
                $baseon = "borrower";
            }else if($baseon == "所属"){
                $baseon = "owner";
            }

            $devs = $this->SearchDev_Mod->searchDevsByScope($baseon,$rule,$scope,$rowCount,$page);
        }else{
            $devs = $this->SearchDev_Mod->getAllDevs($rowCount,$page);
        }
        return $devs;
    }
}