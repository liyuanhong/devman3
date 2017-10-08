<?php 
class SearchDev_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAllDevs(){
        $devs = array();
        $devs['status'] = '200';
        $sql = "select * from devices";
        $query = $this->db->query($sql);
        $devs['devices'] = $query;
        return $devs;
    }
}

