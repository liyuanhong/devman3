<?php 
class UserCenter_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //处理注册用户的事件
    function createAnUserToDatabase($loginName,$userName,$email,$password){
        $curTime = date("Y-m-d H:i:s");
        $data = array(
            'login_name' => $loginName,
            'user_name' => $userName,
            'email' => $email,
            'password' => $password,
            'registe_time' => $curTime
        );
        $query = $this->db->insert('users', $data);
    }
    
    //获取已经注册用户的登录名
    function getLoginNames(){
        $sql = "select login_name from users";
        $query = $this->db->query($sql);
        $result = $query->result();
        $users = array();
        for($i = 0;$i < count($result);$i++){
            $users[$i] = $result[$i]->login_name;
        }
        return $users;
    }
    
    //根据登录名获取密码
    function getLoginPassword($loginName){
        $sql = "select password from users where login_name="."'".$loginName."'";
        $query = $this->db->query($sql);
        $result = $query->result();
        if(count($result) == 0){
            return "";
        }else{
            $password = $result[0]->password;
            return $password;
        }
    }
}