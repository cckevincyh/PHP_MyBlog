/**
 * Created by c on 2017/4/17.
 */

$(function () {


    $('#btn_myInfo').click(function () {

        if (!validMyInfo()) {
            return;
        }
        $.ajax({
            type: 'POST',
            url: '/MyBlog/index.php?p=back&c=MyInfo&a=myInfo',
            cache: false,
            data: {
                name: $.trim($("#name").val()),
                qq: $.trim($("#qq").val()),
                email: $.trim($("#email").val()),
                headImg: $.trim($("#headImg").val()),
                wechatImg: $.trim($("#wechatImg").val())
            },
            success: function (data) {
               showInfo(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                showInfo("提交失败，请重试");
            }
        });


    });
});



function validMyInfo() {
    var flag = true;

    var qq = $.trim($("#qq").val());
    if(qq == ""){
        $('#qq').parent().addClass("has-error");
        $('#qq').next().text("请输入qq号码");
        $("#qq").next().show();
        flag = false;
    }else if(!(/^[1-9][0-9]{4,14}$/.test(qq))){//第一位1-9之间的数字，第二位0-9之间的数字，数字范围4-14个之间
        //电话号码格式的校验
        $('#qq').parent().addClass("has-error");
        $('#qq').next().text("qq号码格式有误");
        $("#qq").next().show();
        flag = false;
    }else {
        $('#qq').parent().removeClass("has-error");
        $('#qq').next().text("");
        $("#qq").next().hide();
    }


    var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    var email = $.trim($("#email").val());
    if(email == ""){
        $('#email').parent().addClass("has-error");
        $('#email').next().text("请输入邮箱");
        $("#email").next().show();
        flag = false;
    }else if(!reg.test(email)){
        //email格式的校验
        $('#email').parent().addClass("has-error");
        $('#email').next().text("邮箱格式有误");
        $("#email").next().show();
        flag = false;
    }else {
        $('#email').parent().removeClass("has-error");
        $('#email').next().text("");
        $("#email").next().hide();
    }

    var name = $.trim($("#name").val());
    if (name == "") {
        $('#name').parent().addClass("has-error");
        $('#name').next().text("请输入姓名");
        $("#name").next().show();
        flag = false;
    } else {
        $('#name').parent().removeClass("has-error");
        $('#name').next().text("");
        $("#name").next().hide();
    }


    var headImg = $.trim($("#headImgUpload").val());
    if (headImg == "") {
        $('#headImgUpload').parent().addClass("has-error");
        $('#headImgUpload').next().text("请选择图片");
        $("#headImgUpload").next().show();
        flag = false;
    } else {
        $('#headImgUpload').parent().removeClass("has-error");
        $('#headImgUpload').next().text("");
        $("#headImgUpload").next().hide();
    }

    var wechatImg = $.trim($("#wechatImgUpload").val());
    if (wechatImg == "") {
        $('#wechatImgUpload').parent().addClass("has-error");
        $('#wechatImgUpload').next().text("请选择图片");
        $("#wechatImgUpload").next().show();
        flag = false;
    } else {
        $('#wechatImgUpload').parent().removeClass("has-error");
        $('#wechatImgUpload').next().text("");
        $("#wechatImgUpload").next().hide();
    }

    return flag;
}






function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}


