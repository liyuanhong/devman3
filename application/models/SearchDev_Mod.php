<?php 
class SearchDev_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //获取数据库中的数据
    public function getAllDevs($rowCount,$page){
        $startInd = ($page - 1) * $rowCount;
        $sql = "select devices.*,dev_imgs.path FROM devices LEFT JOIN dev_imgs ON devices.id = dev_imgs.device_id GROUP BY devices.id ORDER BY devices.add_time DESC limit ".$startInd.",".$rowCount;
        $query = $this->db->query($sql)->result();
        return $query;
    }
    
    //根据表名，获取表中的数据条数
    public function getDataConFromTable($table){
        $sql = "select count(*) as total from ".$table;
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
}

