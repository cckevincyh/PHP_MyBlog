$(document).ready(function(){
    //解决file的change事件只能执行一次的问题
    $(document).on('change','#headImgUpload',function(){
        ajaxHeadImgUpload();

    });
});


//上传头像图片的方法，
function ajaxHeadImgUpload(){
    //调用ajaxfileupload.js中的方法
    $.ajaxFileUpload({
        url:'/MyBlog/index.php?p=back&c=Uploader&a=uploaderHead',//上传图片要提交到的PHP后台Action方法
        secureuri:false,//是否用安全提交，默认为false
        fileElementId:'headImgUpload',//file选择文件的框的id
        dataType:'json',//数据返回格式，如果用json，需要修改ajaxfileupload.js中的内容 eval("data = " + data ); -->data = jQuery.parseJSON(jQuery(data).text());
        success: function (data){
            if(data.success){
                //获得json格式数据的值，并转换显示图片在页面上
                 $("#img1").attr("src",data.path);
                 $("#headImg").val(data.path);

            }
            showInfo(data.info);
        },
        error: function(data, status, e){   //提交失败自动执行的处理函数
            alert(e);
        }
    });
}


function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}