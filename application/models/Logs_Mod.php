<?php 
class Logs_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //向数据库插入一条信息
    public function writeLogToDatabase($arr){
        $uid = $arr["uid"];
        $user_name = $arr["user_name"];
        $action = $arr["action"];
        $type = $arr["type"];
        
        $curTime = date("Y-m-d H:i:s");
        $data = array(
            'uid' => $uid,
            'user_name' => $user_name,
            'time' => $curTime,
            'action' => $action,
            'type' => $type
        );
        $query = $this->db->insert('logs', $data);
    }
}
    
    
    
    
    
    
    
?>