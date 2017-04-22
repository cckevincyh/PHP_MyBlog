<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 9:42
 */

class IndexController extends BaseController{

    /**
     * 主页进入时候左侧排行榜的加载
     */
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


    /**
     * 设置界面的加载
     */
    public function settingAction(){
        require VIEW_PATH."setting.php";
    }


    /**
     * 修改密码界面的加载
     */
    public function changePwdAction(){
        require VIEW_PATH."setting_pwd.php";
    }


    /**
     * 博客详情页面的加载
     */
    public function blog_detailAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail.php";
    }

    /**
     * 博客详情页面正文内容的加载
     */
    public function blog_detail_contentAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail_content.php";
    }

    /**
     * 添加博客页面的加载
     */
    public function add_blogAction(){
        require VIEW_PATH."add_blog_detail.php";
    }


    /**
     * 修改博客页面的加载
     */
    public function update_blogAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."update_blog_detail.php";
    }

    /**
     * 修改博客页面的正文内容的加载
     */
    public function update_blog_contentAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."update_blog_detail_content.php";
    }


    /**
     * 博客顶部的加载
     */
    public function blog_topAction(){
        require VIEW_PATH."blog.php";
    }

    /**
     * 博客右侧的加载
     */
    public function blog_rightAction(){
        require VIEW_PATH."right_panel.php";
    }

    /**
     * 设置中的内容的加载
     */
    public function setting_contentAction(){
        require VIEW_PATH."setting_content.php";
    }

    /**
     * 设置中密码修改页面的加载
     */
    public function setting_pwdAction(){
        require VIEW_PATH."setting_pwd.php";
    }


    /**
     * 添加博客内容的加载
     */
    public function add_blog_detail_contentAction(){
        require VIEW_PATH."add_blog_detail_content.php";
    }
}