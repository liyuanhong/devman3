<?php

class ModifyDev_Mod extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //向设备申请表中插入一条数据
    function insertApplyInfo($device_id,$uid,$status,$from,$to,$fromname,$toname){
        $sql = "insert into dev_status (device_id,uid,status,`from`,`to`,fromname,toname) values (".$device_id.",".$uid.",".$status.",".$from.",".$to.",".$fromname.",".$toname.")";
        $this->db->query($sql);
    }

    //修改设备表中的设备状态
    function modifyDevStatus($dev_id,$status){
        $sql = "update devices set status = ".$status." where id = ".$dev_id;
        $this->db->query($sql);
    }

    //删除设备申请表中的数据
    function deleteApplyInfo($uid,$status){
        $sql = "delete from dev_status where uid = ".$uid." and status = ".$status;
        $this->db->query($sql);
    }
}
