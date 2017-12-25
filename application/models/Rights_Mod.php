<?php
class Rights_Mod extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /*通过用户信息获取指定用户是否有指定的权限
     * $userInfo:包含用户信息的数组
     * $rights：权限名
     * $rightsType 权限类型，及权限对应的数据库表名
    */
    function getRightsByUid($userInfo,$rights,$rightsType){
        $uid = $userInfo[0]['id'];
        $sql = "select ".$rights." from ".$rightsType." where uid='".$uid."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //通过token获取指定用户是否有指定的权限
    function getRightsByToken($token,$right){

    }

    //通过Uid获取指定用户的所有权限
    function getAllRightsOfUserByUid($token){

    }

    //通过token获取指定用户的所有权限
    function getAllRightsOfUserByToken($token){

    }

    //重置角色的用户权限
    function resetRightsByRole(){

    }



}
?>