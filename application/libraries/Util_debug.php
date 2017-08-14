<?php 
//打印两个日期之间的所有日期
function prDates($start,$end){
    $dt_start = strtotime($start);
    $dt_end = strtotime($end);
    while ($dt_start<=$dt_end){
        echo date('Y-m-d',$dt_start)."\n";
        $dt_start = strtotime('+1 day',$dt_start);
    }
}

//获取两个日期之间的所有日期为一个数组
function getDates($start,$end){
    $dt_start = strtotime($start);
    $dt_end = strtotime($end);
    $dateArr = array();
    $i = 0;
    while ($dt_start<=$dt_end){
        //echo date('Y-m-d',$dt_start)."\n";
        $dateArr[$i] = date('Y-m-d',$dt_start);
        $dt_start = strtotime('+1 day',$dt_start);
        $i++;
    }
    return $dateArr;
}


function createLogStr($theTime,$who,$where,$doThings){
    return $theTime." "."*".addSpaceWho($who)."*".$where." "."*".$doThings;
}

function writeToLog($theTime,$who,$where,$doThings){
    $da = date('Y-m-d');
    $theLog = createLogStr($theTime,$who,$where,$doThings);
    $myfile = './logs/'.$da.'.txt';
    $myfile = fopen($myfile, "a+");
    fwrite($myfile, $theLog."\n");
    fclose($myfile);
}
?>