<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 9:42
 */

class IndexController extends BaseController{

    public function indexAction(){

         require VIEW_PATH."index.php";
    }

    public function blog_detailAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail.php";
    }


    public function blog_detail_contentAction(){
        $id = @$_GET['id'];
        require VIEW_PATH."blog_detail_content.php";
    }

}