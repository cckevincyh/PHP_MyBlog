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


    public function changeMyInfoAction(){
        require VIEW_PATH."setting_myInfo.php";
    }
}