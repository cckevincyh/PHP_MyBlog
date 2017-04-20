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
        $content = @$_POST['content'];
        if(!empty($title) && !empty($type) && !empty($content)){
            $articleModel = ModelFactory::getModel("ArticleModel");
            $result = $articleModel->addBlog($title,$type,$content);
            if($result){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "添加失败,请重试";
        }
    }

}