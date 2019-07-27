/*
编辑设备页面，没有传入id，点击跳转到设备列表事件
 */
function jumpToDevlist(){
    var params = getParams();
    getAnPage("managedev/devlist",params);
}


/*
点击编辑设备按钮
 */
function editDev(e){
    var inputEle = $(e).parent().prev();
    if(inputEle.attr("disabled") == undefined) {
        dev_id = $("#dev_id").attr("val");
        type = inputEle.attr("id");
        val = inputEle.val();
        var token = $.cookie('token');

        $.ajax({
            url:getRootUrl() + "ManageDev_Ctr/modifyDevInfo",
            type:"get",
            data:{"dev_id":dev_id,"type":type,"val":val,"token":token},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                var token = obj.token;
                if(status == 200){
                    inputEle.attr("disabled","disabled");
                    $(e).text("编辑");
                    alert(obj.message);
                }else{
                    alert(obj.message);

                }
            }
        });
    }else{
        inputEle.removeAttr("disabled");
        $(e).text("提交");
    }
}

/*
图片的选择与取消选择
 */
function picSelect(e){
    var sta = $(e).attr("sta");
    var val = $(e).attr("val");
    var imgs = $("#dev_pic img");
    var imgLen = imgs.length;

    var isSelect = function(){
        for(var i = 0;i < imgLen;i++){
            if ($(imgs[i]).attr("sta") == 0){

            }else{
                return true;
            }
        }
        return false;
    }
    if(sta == "0"){
        $(e).attr("sta","1");
        $(e).css({"height":"80px","border-style":"solid","border-color":"red","border-width":"2px"});
        if(isSelect()){
            $("#delButton").css("display","inline");
        }else{
            $("#delButton").css("display","none");
        }
    }else if(sta == "1"){
        $(e).attr("sta","0");
        $(e).css({"height":"80px","border-style":"","border-color":"","border-width":""});
        if(isSelect()){
            $("#delButton").css("display","inline");
        }else{
            $("#delButton").css("display","none");
        }
    }
}

//删除一张图片
function delDevImgs(e){
    var dev_id = $("#dev_id").attr("val");
    var token = $.cookie('token');
    var eles = $($(e).prevAll()[0]).children("li");
    var imgs = [];
    var eleLen = eles.length;
    for(var i = 0;i < eleLen;i++){
        imgs[i] = $(eles[i]).children("img").attr("val");
    }

    if(eleLen == 0){

    }else{
        $.ajax({
            url:getRootUrl() + "ManageDev_Ctr/delDevImgs",
            type:"post",
            data:{"imgs":imgs,"token":token,"dev_id":dev_id},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                if(status == 200){
                    alert(obj.message);
                    window.location.reload();
                }else{
                    alert(obj.message);
                }
            }
        });
    }
}

//删除一个设备
function delDevById(){
    var token = $.cookie('token');
    var dev_id = $("#dev_id").attr("val");

    if(confirm("确认删除设备吗？")){
        $.ajax({
            url:getRootUrl() + "ManageDev_Ctr/delDevById",
            type:"get",
            data:{"token":token,"dev_id":dev_id},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                if(status == 200){
                    alert(obj.message);
                    window.location.reload();
                }else{
                    alert(obj.message);
                }
            }
        });
    }
}

//上传设备图片
function uploadHeadPic(){
    var token = getParams()["token"];
    var dev_id = $("#dev_id").attr("val");
    var url = getRootUrl() + "ManageDev_Ctr/uploadDevImage?" + "token=" + token + "&dev_id=" + dev_id;
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                window.location.reload();
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
}