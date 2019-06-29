<?php 
//控制左侧侧边栏收起或展示css的方法
function getLeftItemShow(){
    echo "aaa='bbb'";
}

//控制左侧侧边栏箭头的展示方向
function ctrLeftArrowShow($item,$current){
    if($item == $current){
        echo 'class="treeview menu-open"';
    }else{
        echo 'class="treeview"';
    }
}

//控制左侧侧边栏选项卡是否被选中
function ctrLeftItemShow($item,$current){
    if($item == $current){
        echo 'class="menu active"';
    }else{
        echo 'class="menu"';
    }
}

//控制左侧侧边栏是展开还是收起
function ctrLeftItemExpand($item,$current){
    if($item == $current){
        echo 'style="display: block;"';
    }else{
        echo 'style="display: none;"';
    }
}

//根据索引获取url的参数
function getIndexOfUrl($th,$ind){
    $url = $th->uri->segment($ind);
    return $url;
}

//字符串转数组
function strToArray($str){
    $len = strlen($str);
    $arr = array();
    for($i = 0;$i < strlen($str);$i++){
        $arr[$i] = $str[$i];
    }
    return $arr;
}

//判断是否有这个get参数
function hasThisGetParam($param){
    if(is_array($_GET)&&count($_GET)>0){//先判断是否通过get传值了
        if(isset($_GET[$param])){//是否存在"id"的参数{
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//判断是否有这个post参数
function hasThisPOSTParam($param){
    if(is_array($_POST)&&count($_POST)>0){//先判断是否通过get传值了
        if(isset($_POST[$param])){//是否存在"id"的参数{
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

//判断数组是否有该值
function hasArrValue($arr,$val){
    for($i = 0;$i < count($arr);$i++){
        if($arr[$i] == $val){
            return true;
        }
    }
    return false;
}

//通过get方式获取某个参数,如果没有该参数，则返回默认值
function get($param,$defaultVal){
    if(hasThisGetParam($param)){
        $val = $_GET[$param];
        if($val == "undefined" or $val == ""){
            return $defaultVal;
        }else{
            return $val;
        }
    }else{
        return $defaultVal;
    }
}

//通过post方式获取某个参数,如果没有该参数，则返回默认值
function post($param,$defaultVal){
    if(hasThisPOSTParam($param)){
        $val = $_POST[$param];
        return $val;
    }else{
        return $defaultVal;
    }
}






