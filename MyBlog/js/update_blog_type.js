/**
 * Created by c on 2017/4/19.
 */


$(function () {




        $('#updateBlogType').click(function () {

            if (!validUpdateBlogType()) {
                return;
            }
            $.ajax({
                type: 'POST',
                url: '/MyBlog/index.php?p=back&c=ArticleType&a=updateType',
                cache: false,
                data: {
                    blogType: $.trim($("#updateTypeName").val()),
                    blogId : $.trim($("#updateId").val()),
                },
                success: function (data) {
                    $("#updateModal").modal("hide");//关闭模糊框
                    showInfo(data);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    showInfo("提交失败，请重试");
                }
            });

            $('#modal_info').on('hide.bs.modal', function () {//提示模糊框隐藏时候触发
                location.reload();  	//刷新当前页面
            });
        });


    $('#modal_info').on('hide.bs.modal',function() {//提示模糊框隐藏时候触发
        location.reload();  	//刷新当前页面
    });



});



function validUpdateBlogType() {
    var flag = true;


    var name = $.trim($("#updateTypeName").val());
    if (name == "") {
        $('#updateTypeName').parent().addClass("has-error");
        $('#updateTypeName').next().text("请输入博文分类名称");
        $("#updateTypeName").next().show();
        flag = false;
    }else {
        $('#updateTypeName').parent().removeClass("has-error");
        $('#updateTypeName').next().text("");
        $("#updateTypeName").next().hide();
    }





    return flag;
}


function updateType(id){

    $.ajax({
        type: 'GET',
        url: '/MyBlog/index.php?p=back&c=ArticleType&a=getTypeById&tid='+id,
        cache: false,
        dataType: "json",
        success: function (data) {
            $("#updateId").val(data.tid);
            $("#updateTypeName").val(data.tname);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            showInfo("提交失败，请重试");
        }
    });


}



function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}


