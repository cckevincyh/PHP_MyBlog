<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */
class ArticleTypeController extends BaseController {


    /**
     * 获取文章分类数据，显示到博客分类设置
     */
    public function indexAction(){
        $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
        $result = $articleTypeModel->getLimitArticleTypes(1,9);
        require VIEW_PATH."blog_type.php";
    }


    /**
     *添加新的博客分类
     */
    public function addTypeAction(){

        $blogType = $_POST['blogType'];
        if(!empty($blogType)){
            //添加新博客分类
            $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
            $b = $articleTypeModel->addArticleType($blogType);
            if($b){
                echo "添加成功";
            }else{
                echo "添加失败";
            }
        }else{
            echo "添加失败";
        }
    }
}