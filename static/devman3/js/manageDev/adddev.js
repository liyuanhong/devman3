/*
点击添加设备
 */
function addDev(){
    var token = getParams()["token"];
    var device_name = $("#device_name").val();
    var model = $("#model").val();
    var plateform = $("#plateform").val();
    var brand = $("#brand").val();
    var version = $("#version").val();
    var owner = $("#owner").val();
    var comments = $("#comments").val();
    var dev_type = $("#dev_type").val();
    // console.log(device_name);
    // console.log(model);
    // console.log(plateform);
    // console.log(brand);
    // console.log(version);
    // console.log(owner);
    // console.log(comments);
    // console.log(dev_type);
    $.ajax({
        url:getRootUrl() + "ManageDev_Ctr/addDev",
        type:"post",
        data:{"token":token,"device_name":device_name,"model":model,"plateform":plateform,"brand":brand,"version":version,"owner":owner,"comments":comments,"dev_type":dev_type},
        success:function(result){
            var obj = JSON.parse(result);
            var status = obj.status;
            if(status == 200){
                alert(obj.message);
                var params = getParams();
                params["id"] = obj.id.id;
                getAnPage("managedev/editdev",params);
            }else{
                alert(obj.message);
            }
        }
    });
}

/*
点击且换设备类型
 */
function swichDevType(){

}