/**
 * Created by c on 2017/4/20.
 */
$(function () {


        $.ajax({
            type: 'GET',
            url: '/MyBlog/index.php?c=MyInfo&a=getImg',
            cache: false,
            dataType:"json",
            success: function (data) {
                $("#head_img").attr("src",data.head_img);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("提交失败，请重试");
            }
        });

});