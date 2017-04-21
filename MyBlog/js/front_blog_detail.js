/**
 * Created by c on 2017/4/18.
 */


//加入在线编辑器
var editor;
KindEditor.ready(function(K) {
    //在当前网页中，查找<textarea id = "blog_detail_content"></textarea>，并替换成kindeditor编辑器。
        editor = K.create('textarea[id="blog_detail_content"]', {
        height:"750px",
        allowFileManager : true ,  //是否允许上传文件
        resizeType:0, //1只能拖动高度，0不能拖动
        readonlyMode : true,//初始化设置为只读模式
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
        ]
    });
});



function getBlogDetail(id) {
    $.ajax({
        type: 'GET',
        url: '/MyBlog/index.php?c=Article&a=getBlogById&id='+id,
        dataType:"json",
        cache: false,
        success: function (data) {
            $("#title").text(data.atitle);
            $("#postdate").text(data.atime);
            $("#page_view").text("浏览 ("+data.page_view+")");
            $("#like_num").text("点赞 ("+data.like_num+")");
            $("#type").text(data.tname);
            editor.html(data.acontent);
           // alert(data);

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert("提交失败，请重试");
        }
    });

}




