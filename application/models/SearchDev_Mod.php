<?php 
class SearchDev_Mod extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //获取数据库中的数据
    public function getAllDevs($rowCount,$page){
        $info = array("id","device_name","model","theNum","plateform","brand","version","owner","status","borrower");
        array_push($info,"comments","category","check_dev","add_time","borrow_time");
        $startInd = ($page - 1) * $rowCount;
        $sql = "select " ;
        for($i = 0;$i < count($info);$i++){
            if($i != count($info) - 1){
                $sql = $sql."devices.".$info[$i].",";
            }else{
                $sql = $sql.$info[$i].",";
            }
        }
        $sql1 = $sql." dev_imgs.path FROM devices LEFT JOIN dev_imgs ON devices.id = dev_imgs.device_id GROUP BY devices.id ORDER BY devices.add_time DESC limit ".$startInd.",".$rowCount;
        $sql2 = $sql." dev_imgs.path FROM devices LEFT JOIN dev_imgs ON devices.id = dev_imgs.device_id GROUP BY devices.id ORDER BY devices.add_time";

        $query = $this->db->query($sql1)->result();
        $query2 = $this->db->query($sql2)->result();
        $total = count($query2);

        $result = array();
        $result["devs"] = $query;
        $result["total"] = $total;;

        return $result;
    }

    #通过提供的设备信息来进行搜索，$devInfo是一个数组
    public function getDevsByDevInfo($devInfo){

    }
    
    //根据表名，获取表中的数据条数
    public function getDataConFromTable($table){
        $sql = "select count(*) as total from ".$table;
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    //通过设备的信息搜索设备
    public function searchDevsByInfo($filter,$rowCount,$page){
        $startInd = ($page - 1) * $rowCount;
        $sql = "select ";
        $info = array("id","device_name","model","theNum","plateform","brand","version","owner","status","borrower");
        array_push($info,"comments","category","check_dev","add_time","borrow_time");

        for($i = 0;$i < count($info);$i++){
            if($i != count($info) - 1){
                $sql = $sql."devices.".$info[$i].",";
            }else{
                $sql = $sql."devices.".$info[$i].",";
            }
        }
        $infoKey = array_keys($filter);
        $sql = $sql." dev_imgs.path FROM devices LEFT JOIN dev_imgs ON devices.id = dev_imgs.device_id ";
        $ind = 0;
        for($j = 0;$j < count($infoKey);$j++){
            if($filter[$infoKey[$j]] == "all"){

            }else{
                if($j != count($infoKey) -1){
                    if($ind == 0){
                        if($infoKey[$j] == "version"){
                            $sql = $sql." where ";
                            $sql = $sql.$infoKey[$j]." like '%".$filter[$infoKey[$j]]."%'";
                            $ind++;
                        }else{
                            $sql = $sql." where ";
                            $sql = $sql.$infoKey[$j]."='".$filter[$infoKey[$j]]."'";
                            $ind++;
                        }
                    }else{
                        if($infoKey[$j] == "version"){
                            $sql = $sql." and ".$infoKey[$j]." like '%".$filter[$infoKey[$j]]."%'";
                        }else{
                            $sql = $sql." and ".$infoKey[$j]."='".$filter[$infoKey[$j]]."'";
                        }
                    }
                }else{
                    if($ind == 0){
                        if($infoKey[$j] == "version"){
                            $sql = $sql." where ";
                            $sql = $sql." and ".$infoKey[$j]." like '%".$filter[$infoKey[$j]]."%'";
                            $ind++;
                        }else{
                            $sql = $sql." where ";
                            $sql = $sql." and ".$infoKey[$j]."='".$filter[$infoKey[$j]]."'";
                            $ind++;
                        }
                    }else{
                        if($infoKey[$j] == "version"){
                            $sql = $sql." and ".$infoKey[$j]." like '%".$filter[$infoKey[$j]]."%'";
                        }else{
                            $sql = $sql." and ".$infoKey[$j]."='".$filter[$infoKey[$j]]."'";
                        }
                    }
                }
            }

        }
        $sql1 = $sql." GROUP BY devices.id ORDER BY devices.add_time DESC limit ".$startInd.",".$rowCount;
        $sql2 = $sql." GROUP BY devices.id ORDER BY devices.add_time";
        $query = $this->db->query($sql1)->result();
        $query2 = $this->db->query($sql2)->result();
        $total = count($query2);

        $result = array();
        $result["devs"] = $query;
        $result["total"] = $total;

        return $result;
        //print_r(json_encode($info));
        //print_r($info);
        //print_r($infoKey);
        //print_r(json_encode($infoKey));
//        print_r($sql);
//        exit;
    }
}

