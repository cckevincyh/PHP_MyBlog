/**
 * Created by c on 2017/4/20.
 */
$(function () {


        $.ajax({
            type: 'GET',
            url: '/MyBlog/index.php?p=back&c=MyInfo',
            cache: false,
            dataType:"json",
            success: function (data) {
                $("#head_img").attr("src",data.head_img);
                $("#page_view").text(data.page_view + "次");
                $("#name").text(data.mname );
                $("#qq").text(data.qq );
                $("#email").text(data.email );
                $("#blog_num").text(data.blog_num + "篇");
                $("#wechat").attr("src",data.wechat);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("提交失败，请重试");
            }
        });

});