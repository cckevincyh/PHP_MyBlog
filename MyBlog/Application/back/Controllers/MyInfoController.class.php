<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */

class MyInfoController extends BaseController {


    public function myInfoAction(){
        //获取数据
        $qq = $_POST['qq'];
        $email = $_POST['email'];
        $headImg = $_POST['headImg'];
        $wechatImg = $_POST['wechatImg'];
        $data = "提交失败";
        if(!empty($qq) && !empty($email) && !empty($headImg) && !empty($wechatImg)){
            //查看是否已经有个人资料
            $myInfoModel = ModelFactory::getModel("MyInfoModel");
            $myInfo = $myInfoModel->getMyInfo();
            if(!empty($myInfo)){
                //已经有个人资料，进行修改操作
                $b = $myInfoModel->updateMyInfo($qq,$email,$headImg,$wechatImg);
                if(!empty($b)){
                    $data = "修改成功";
                }
            }else{
                //还没有个人资料，进行添加操作
                $b = $myInfoModel->addMyInfo($qq,$email,$headImg,$wechatImg);
                if(!empty($b)){
                    $data = "添加成功";
                }
            }
        }
        echo $data;
    }
}