/**
 * Created by c on 2017/4/20.
 */
function deleteType(id){
    $.ajax({
        type: 'GET',
        url: '/MyBlog/index.php?p=back&c=ArticleType&a=deleteType&tid='+id,
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


