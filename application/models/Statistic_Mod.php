<?php

/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2017/12/26
 * Time: 下午2:11
 */
class Statistic_Mod extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /*
     * 插入一条统计信息
     * $userInfo 包含用户信息的数组
     * $statisticInfo 统计的信息，指：什么统计，统计的页面
     * statictisType 统计的类型，默认值为1，对页面访问进行统计
     * $value 值默认为1，主要为以后提供扩展
     */
    function insertStatisticInfo($userInfo,$statisticInfo,$statictisType=1,$value=1){
        $uid = $userInfo[0]['id'];
        $user_name = $userInfo[0]['user_name'];
        $curTime = date("Y-m-d H:i:s");
        $data = array(
            'uid' => $uid,
            'user_name' => $user_name,
            'info' => $statisticInfo,
            'type' => $statictisType,
            'time' => $curTime,
            'value' => $value
        );
        $query = $this->db->insert('statistic_page', $data);
    }
}
