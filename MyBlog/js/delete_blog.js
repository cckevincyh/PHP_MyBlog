/**
 * Created by c on 2017/4/19.
 */
/**
 * Created by c on 2017/4/20.
 */
$(function () {
    $('#modal_info').on('hide.bs.modal', function () {//提示模糊框隐藏时候触发
        location.reload();  	//刷新当前页面
    });
});

function deleteBlog(id){

    $.ajax({
        type: 'GET',
        url: '/MyBlog/index.php?p=back&c=Article&a=deleteBlog&id='+id,
        cache: false,
        success: function (data) {
            showInfo(data);

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


