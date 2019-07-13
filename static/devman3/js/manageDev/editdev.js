/*
编辑设备，没有传入id，点击跳转到设备列表事件
 */
function jumpToDevlist(){
    var params = getParams();
    getAnPage("managedev/devlist",params);
}