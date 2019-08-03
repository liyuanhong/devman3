<?php

/**
 * Created by PhpStorm.
 * User: liyuanhong
 * Date: 2017/12/26
 * Time: 下午7:18
 */
class DevAttrs_Mod extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //获取手机指定属性信息
    public function getMobileAttrs($type){
        //指定要获取的信息
        $info = array("type_platform","type_brand","type_system","type_status","type_category");
        array_push($info,"type_check");
        //特殊的信息是以数字来表示的，所以需要单独处理
        $special_info = array("type_status","type_check");
        $attrs = array();
        for($i = 0;$i < count($info);$i++){
            if(in_array($info[$i],$special_info)){
                $sql = "select distinct ".$info[$i].",comment from dev_attrs where type_id=$type";
                $query = $this->db->query($sql);
                $result = $query->result_array();
                $res = array();
                for($j = 0;$j < count($result);$j++){
                    if($result[$j][$info[$i]] != null){
                        array_push($res,$result[$j]["comment"]);
                    }
                }
            }else{
                $sql = "select distinct ".$info[$i]." from dev_attrs where type_id=$type";
                $query = $this->db->query($sql);
                $result = $query->result_array();
                $res = array();
                for($j = 0;$j < count($result);$j++){
                    if($result[$j][$info[$i]] != null){
                        array_push($res,$result[$j][$info[$i]]);
                    }
                }
            }
            $attrs[$info[$i]] = $res;
        }
        return $attrs;
    }

    //获取所有指定的设备类型
    function getAllDevType(){
        $sql = "select distinct type_id,type_detail from dev_attrs";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

}