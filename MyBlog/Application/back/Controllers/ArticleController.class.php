<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class ArticleController extends BaseController {

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

    public function getBlogByIdAction(){
        $aid = @$_GET['id'];
        $articleModel = ModelFactory::getModel("ArticleModel");
        $result = $articleModel->getArticleById($aid);
        $result['acontent'] = urldecode($result['acontent']);
        echo json_encode($result);
    }

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




}