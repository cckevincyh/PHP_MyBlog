/**
 * Created by c on 2017/4/18.
 */


$(function () {


    $('#addBlogType').click(function () {

        if (!validAddBlogType()) {
            return;
        }
        $.ajax({
            type: 'POST',
            url: '/MyBlog/index.php?p=back&c=ArticleType&a=addType',
            cache: false,
            data: {
                blogType: $.trim($("#addTypeName").val()),

            },
            success: function (data) {
                $("#addModal").modal("hide");//关闭模糊框
                showInfo(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                showInfo("提交失败，请重试");
            }
        });

        $('#modal_info').on('hide.bs.modal',function() {//提示模糊框隐藏时候触发
            location.reload();  	//刷新当前页面
        });
    });
});



function validAddBlogType() {
    var flag = true;

    var blogType = $.trim($("#addTypeName").val());
    if(blogType == ""){
        $('#addTypeName').parent().addClass("has-error");
        $('#addTypeName').next().text("请输入博客分类名称");
        $("#addTypeName").next().show();
        flag = false;
    }else {
        $('#addTypeName').parent().removeClass("has-error");
        $('#addTypeName').next().text("");
        $("#addTypeName").next().hide();
    }


    return flag;
}






function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}





