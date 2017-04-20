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
        $pageCode = @$_GET['pageCode'];
        // 获取页面传递过来的当前页码数
        if (empty($pageCode)) {
            $pageCode = 1;
        }
        $pageSize = 9;
        $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
        $result = $articleTypeModel->getLimitArticleTypes($pageCode,$pageSize);
        require VIEW_PATH."blog_type.php";
    }


    /**
     * 根据id获取博客类型
     */
    public function getTypeByIdAction(){
        $id = @$_GET['tid'];
        if (!empty($id)) {
            $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
            $result = $articleTypeModel->getArticleTypeById($id);
            echo json_encode($result);
        }
    }



    /**
     * 根据获取博客类型
     */
    public function getTypesAction(){
        $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
        $result = $articleTypeModel->getArticlTypes();
        echo json_encode($result);
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


    public function updateTypeAction(){
        $blogType = @$_POST['blogType'];
        $blogId = @$_POST['blogId'];
        if(!empty($blogType) && !empty($blogId)){
            //添加新博客分类
            $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
            $b = $articleTypeModel->updateArticleType($blogId,$blogType);
            if($b){
                echo "修改成功";
            }else{
                echo "修改失败";
            }
        }else{
            echo "修改失败";
        }
    }


    public function deleteTypeAction(){
        $id = @$_GET['tid'];
        if (!empty($id)) {
            $articleTypeModel = ModelFactory::getModel("ArticleTypeModel");
            $result = $articleTypeModel->deleteArticleType($id);
            if($result){
                echo "删除成功";
            }else{
                echo "删除失败";
            }
        }else{
            echo "删除失败";
        }
    }
}