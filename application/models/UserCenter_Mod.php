<?php 
class UserCenter_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //处理注册用户的事件
    function createAnUserToDatabase($loginName,$userName,$email,$password){
        $curTime = date("Y-m-d H:i:s");
        $role = 2;
        $data = array(
            'login_name' => $loginName,
            'user_name' => $userName,
            'email' => $email,
            'password' => $password,
            'registe_time' => $curTime,
            'role' => $role
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
    
    //存入对应用户的token
    function storeAnToken($loginName,$session,$token){
        $curTime = date("Y-m-d H:i:s");
        $sql = "update users set token='".$token."',login_time='".$curTime."' where login_name='".$loginName."'";
        $query = $this->db->query($sql);
    }
    
    //通过token获取用户信息
    function getUserInfoByToken($token){
        $sql = "select id,user_name,login_name,role,icon,icon_url from users where token='".$token."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    //通过token获取用户信息，如果没有获取到，自动去anymous的用户信息
    function getUserInfoByTokenDefaultAnymous($token){
        $sql = "select id,user_name,login_name,role,icon,icon_url from users where token='".$token."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $con = count($result);
        if($con == 0){
            $sql = "select id,user_name,login_name,role,icon,icon_url from users where login_name='anymous'";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            return $result;
        }else{
            return $result;
        }
    }

    //通过登陆名获取用户信息
    function getUserInfoByLoginName($login_name){
        $sql = "select id,user_name,role,icon,icon_url from users where login_name='".$login_name."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    
    //处理退出登陆用户的清除token操作
    function clearToken($token){
        $sql = "update users set token='0' where token='".$token."'";
        $query = $this->db->query($sql);
    }
    

}