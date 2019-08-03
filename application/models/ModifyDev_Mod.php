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

    //修改设备信息
    function modifyDevInfo($dev_id,$type,$info){
        $sql = "update devices set ".$type." = '".$info."' where id = ".$dev_id;
        $this->db->query($sql);
    }

    //通过设备id，给设备添加一张图片
    function addPicById($dev_id,$path){
        $sql = "insert into dev_imgs (device_id,path) values ($dev_id,'$path')";
        $this->db->query($sql);
    }

    //通过设备id，删除设备对应的设备图片
    function delDevImgsById($dev_id){
        $sql = "delete from dev_imgs where device_id = ".$dev_id;
        $this->db->query($sql);
    }

    //通过图片名字，删除设备图片
    function delDevImgsByImg($path){
        $sql = "delete from dev_imgs where path = '".$path."'";
        $this->db->query($sql);
    }

    //删除设备id对应的设备
    function delDevById($dev_id){
        $sql = "delete from devices where id = ".$dev_id;
        $this->db->query($sql);
    }

    //添加设备
    function adddev($device_name,$model,$plateform,$brand,$version,$owner,$comments){
        $sql = "insert into devices (device_name,model,plateform,brand,version,owner,comments) values ('$device_name','$model','$plateform','$brand','$version','$owner','$comments')";
        $this->db->query($sql);
        $sql = "SELECT LAST_INSERT_ID() as id";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

}
