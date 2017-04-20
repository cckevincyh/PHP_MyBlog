/**
 * Created by c on 2017/4/20.
 */
$(function () {
    $.ajax({
            type: 'GET',
            url:"/MyBlog/index.php?p=back&c=ArticleType&a=getTypes",
            dataType:"json",
            success:function(data) {
                // 循环遍历每个博客分类，每个名称生成一个option对象，添加到<select>中
                for(var index in data) {
                    var op = document.createElement("option");//创建一个指名名称元素
                    op.value = data[index].tid;//设置op的实际值为当前的博客分类编号
                    var textNode = document.createTextNode(data[index].tname);//创建文本节点
                    op.appendChild(textNode);//把文本子节点添加到op元素中，指定其显示值

                    document.getElementById("type").appendChild(op);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("提交失败，请重试");
            }
        });
    $("#addType").click(function(){
        $.ajax({
            type: 'POST',
            url: '/MyBlog/index.php?p=back&c=ArticleType&a=addType',
            cache: false,
            data: {
                blogType: $.trim($("#typeName").val()),

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

function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}