<?php
/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2017/12/25
 * Time: 下午5:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require dirname(__FILE__)."/../libraries/Util.php";

class Rights_Ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rights_Mod');
    }


}

?>