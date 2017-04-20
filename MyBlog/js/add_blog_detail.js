/**
 * Created by c on 2017/4/18.
 */
$(function () {


        $('#post_blog').click(function () {

            if(!validBlog()){
                return ;
            }

            //encodeURIComponent() 函数可把字符串作为 URI 组件进行编码。
    //    	该方法不会对 ASCII 字母和数字进行编码，也不会对这些 ASCII 标点符号进行编码： - _ . ! ~ * ' ( ) 。
    //    	其他字符（比如 ：;/?:@&=+$,# 这些用于分隔 URI 组件的标点符号），都是由一个或多个十六进制的转义序列替换的。

            $.ajax({
                type: 'POST',
                url: '/MyBlog/index.php?p=back&c=Article&a=addBlog',
                cache: false,
                data: {
                    title:$.trim($("#title").val()),
                    type:$.trim($("#type").val()),
                    content:encodeURIComponent(editor.html()),

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

    $('#modal_info').on('hide.bs.modal',function() {//提示模糊框隐藏时候触发
        location.reload();  	//刷新当前页面
    });



});

//加入在线编辑器
var addEditor;
KindEditor.ready(function(K) {
    //在当前网页中，查找<textarea id = "add_blog_detail"></textarea>，并替换成kindeditor编辑器。
        editor = K.create('textarea[id="add_blog_detail"]', {
        height:"750px",
        allowFileManager : true ,  //是否允许上传文件
        resizeType:0, //1只能拖动高度，0不能拖动
        allowImageUpload:true,//允许上传图片
        allowImageRemote:false,//去掉网络图片按钮
        allowFileManager:true, //允许对上传图片进行管理
        uploadJson : '/MyBlog/js/kindeditor-4.1.10/php/upload_json.php',
        fileManagerJson : '/MyBlog/js/kindeditor-4.1.10/php/file_manager_json.php',
        afterCreate : function() {//获取 KindEditor里面的内容
            this.sync();
        },
        afterBlur:function(){ //获取 KindEditor里面的内容
            this.sync();
        },
        items:[
            'source', '|', 'undo', 'redo', '|', 'preview',  'cut', 'copy', 'paste',
            '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
            'superscript', 'clearhtml', 'quickformat', 'selectall', '|', 'fullscreen',
            'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
            'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image',
            'table', 'hr', 'emoticons',  '|'
        ]
    });
});



function validBlog(){
    var flag = true;

    var title = $.trim($("#title").val());
    if(title == ""){
        $('#title').parent().addClass("has-error");
        $('#title').next().text("请输入博文标题");
        $("#title").next().show();
        flag = false;
    }else {
        $('#title').parent().removeClass("has-error");
        $('#title').next().text("");
        $("#title").next().hide();
    }

    var type = $.trim($("#type").val());
    if(type == -1){
        $('#type').parent().addClass("has-error");
        $('#type').next().text("请选择博文分类");
        $("#type").next().show();
        flag = false;
    }else {
        $('#type').parent().removeClass("has-error");
        $('#type').next().text("");
        $("#type").next().hide();
    }


    var content = editor.html();
    if(content == ""){
        $('#add_blog_detail').parent().addClass("has-error");
        $('#add_blog_detail').next().text("请输入博文内容");
        $("#add_blog_detail").next().show();
        if(flag==true) {
            alert("请输入博文内容");
        }
        flag = false;
    }else {
        $('#add_blog_detail').parent().removeClass("has-error");
        $('#add_blog_detail').next().text("");
        $("#add_blog_detail").next().hide();
    }


    return flag;
}



function showInfo(msg) {
    $("#div_info").text(msg);
    $("#modal_info").modal('show');
}