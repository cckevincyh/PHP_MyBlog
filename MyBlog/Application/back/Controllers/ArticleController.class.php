<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class ArticleController extends BaseController {

    /**
     * 添加博文
     */
    public function addBlogAction(){
        $title = @$_POST['title'];
        $type = @$_POST['type'];
        $img = @$_POST['img'];
        $content = @$_POST['content'];
        if(!empty($title) && !empty($type) && !empty($content) && !empty($img)){
            $articleModel = ModelFactory::getModel("ArticleModel");
            $result = $articleModel->addBlog($title,$type,$content,$img);
            if($result){
                //同时让博文数量增加
                $myInfoModel = ModelFactory::getModel("MyInfoModel");
                $myInfoModel->addBlogNum();
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "添加失败,请重试";
        }
    }

    /**
     * 根据博文分类得到相关分类的博文
     */
    public function getBlogByIdAction(){
        $aid = @$_GET['id'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleById($aid);
        $result['acontent'] = urldecode($result['acontent']);
        echo json_encode($result);
     //   require VIEW_PATH."blog_detail_content.php";
    }

    /**
     * 对博文进行分页
     */
    public function getLimitBlogsAction(){
        $pageCode = @$_GET['pageCode'];
        // 获取页面传递过来的当前页码数
        if (empty($pageCode)) {
            $pageCode = 1;
        }
        $pageSize = 3;
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getLimitArticles($pageCode,$pageSize);
        //echo json_encode($result);
        require VIEW_PATH."blog_content.php";
    }

    /**
     * 修改博文
     */
    public function updateBlogAction(){
        $title = @$_POST['title'];
        $type = @$_POST['type'];
        $img = @$_POST['img'];
        $content = @$_POST['content'];
        $aid = @$_POST['id'];
        if(!empty($title) && !empty($type) && !empty($content) && !empty($img) && !empty($aid)) {
            $articleModel = ModelFactory::getModel("ArticleModel");
            $result = $articleModel->updateBlog($title,$type,$content,$img,$aid);
            if($result){
                echo "编辑成功";
            }else{
                echo "编辑失败";
            }
        }else{
            echo "编辑失败,请重试";
        }
    }


    /**
     * 删除博文
     */
    public  function deleteBlogAction(){
        $aid = @$_GET['id'];
        if(!empty($aid)){
            $articleModel = ModelFactory::getModel("ArticleModel");
            $result = $articleModel->deleteBlog($aid);
            if($result){
                //相应的博文数量需要减去
                $myInfoModel = ModelFactory::getModel("MyInfoModel");
                $myInfoModel->reduceBlogNum();
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "删除失败,请重试";
        }
    }



    /**
     * 后台首页搜索
     */
    public function searchAction(){

        $pageCode = @$_GET['pageCode'];
        if (empty($pageCode)) {
            $pageCode = 1;
        }
        $pageSize = 3;

        $search = @$_REQUEST['search'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleBySearch($search,$pageCode,$pageSize);
        require VIEW_PATH."blog_content.php";
    }

}