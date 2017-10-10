<?php 
class SearchDev_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllDevs(){
        $sql = "select devices.*,dev_imgs.path FROM devices LEFT JOIN dev_imgs ON devices.id = dev_imgs.device_id GROUP BY devices.id";
        $query = $this->db->query($sql)->result();
        return $query;
    }
}

