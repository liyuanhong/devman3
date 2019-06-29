/*
设备详情，没有传入id，点击跳转到首页的按钮时间
 */

function jumpToIndex(){
    var params = getParams();
    getAnPage("welcome/showdevs",params);
}