<?php 
//根据查询信息，判断用户是否登录
function isUserLogin($info){
    $con = count($info);
    if($con == 0){
        return false;
    }else{
        return true;
    }
}

?>