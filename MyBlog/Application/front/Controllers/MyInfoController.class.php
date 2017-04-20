<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class MyInfoController extends BaseController {


    public function indexAction(){
        $myInfo =  ModelFactory::getModel("MyInfoModel");
        //增加访问量
        $myInfo->addPageView();
        $result = $myInfo->getMyInfo();
        echo json_encode($result);
    }
}