<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 9:42
 */

class IndexController{

    public function indexAction(){

         require VIEW_PATH."index.php";
    }


    public function settingAction(){
        require VIEW_PATH."setting.php";
    }


    public function changePwdAction(){
        require VIEW_PATH."setting_pwd.php";
    }


    public function blog_detailAction(){
        require VIEW_PATH."blog_detail.php";
    }

    public function blog_detail_contentAction(){
        require VIEW_PATH."blog_detail_content.php";
    }

}