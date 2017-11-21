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