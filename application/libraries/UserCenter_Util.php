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

function checkLogin($isLogin,$base_url){
    if($isLogin){

    }else{
        header("Location: ".$base_url."usercenter/login");
    }
}

?>