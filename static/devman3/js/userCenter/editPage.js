//上传用户头像
function uploadHeadPic(){
    var token = getParams()["token"];
    var url = getRootUrl() + "UserCenter_Ctr/uploadHeadPic?" + "token=" + token;
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $("#headpic").attr("src",getRootUrl() + "photo/headpic/" + file.name);
                $("#head_image1").attr("src",getRootUrl() + "photo/headpic/thumbnail/" + file.name);
                $("#head_image2").attr("src",getRootUrl() + "photo/headpic/thumbnail/" + file.name);
                //$('<p/>').text(file.name).appendTo('#files');
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

//修改用户资料
function modifyUserInfo(e){
    if($(e).parent().prev().attr("disabled") == undefined){
        type = $(e).attr("tag").split("-")[1];
        value = $(e).parent().prev().val()
        $(e).parent().prev().attr("disabled","disabled")
        var token = $.cookie('token');
        $.ajax({
            url:getRootUrl() + "UserCenter_Ctr/modifyUserInfo",
            type:"post",
            data:{"type":type,"value":value,"token":token},
            success:function(result){
                var obj = JSON.parse(result);
                var status = obj.status;
                var token = obj.token;
                if(status == 200){
                    alert("修改成功");
                }else{
                    alert("后端处理退出登陆失败：" + result);

                }
            }
        });
    }else{
        $(e).parent().prev().removeAttr("disabled");
    }
}