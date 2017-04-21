<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class ArticleController extends BaseController {

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

    public function getBlogByIdAction(){
        $aid = @$_GET['id'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleById($aid);
        $result['acontent'] = urldecode($result['acontent']);
        echo json_encode($result);
        //   require VIEW_PATH."blog_detail_content.php";
    }



    public function likeAction(){
        $aid = @$_GET['id'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->likeById($aid);
        if($result){
            echo "点赞成功";
        }else{
            echo "点赞失败";
        }
    }


    /**
     * 根据博文分类找到相关的博文
     */
    public function getArticleByTypeAction(){
        $pageCode = @$_GET['pageCode'];
        // 获取页面传递过来的当前页码数
        if (empty($pageCode)) {
            $pageCode = 1;
        }
        $pageSize = 3;
        $type = @$_GET['type'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleByType($type,$pageCode,$pageSize);
        require VIEW_PATH."blog_content.php";
    }
}