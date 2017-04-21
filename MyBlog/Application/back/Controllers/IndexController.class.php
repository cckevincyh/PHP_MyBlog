<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 9:42
 */

class IndexController extends BaseController{

    public function indexAction(){
        $articleModel = ModelFactory::getModel("ArticleModel");
        //获取阅读量排行榜
        $watchSize = 5;  //显示的内容数量
        $watchList = $articleModel->watchList($watchSize);
        //获取点赞排行榜
        $likeSize = 5;  //显示的内容数量
        $likeList = $articleModel->likeList($likeSize);
        //获取文章分类列表
        $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
        $typeList = $articleTypeModel->getArticleTypesList();
        require VIEW_PATH."index.php";
    }


    public function settingAction(){
        require VIEW_PATH."setting.php";
    }


    public function changePwdAction(){
        require VIEW_PATH."setting_pwd.php";
    }


    public function blog_detailAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail.php";
    }

    public function blog_detail_contentAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail_content.php";
    }

    public function add_blogAction(){
        require VIEW_PATH."add_blog_detail.php";
    }


    public function update_blogAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."update_blog_detail.php";
    }

    public function update_blog_contentAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."update_blog_detail_content.php";
    }

}