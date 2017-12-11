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
}