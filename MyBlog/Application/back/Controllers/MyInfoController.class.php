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
        $result = $myInfo->getMyInfo();
        echo json_encode($result);
    }


    /**
     * 修改或者添加个人资料
     */
    public function myInfoAction(){
        //获取数据
        $name = $_POST['name'];
        $qq = $_POST['qq'];
        $email = $_POST['email'];
        $headImg = $_POST['headImg'];
        $wechatImg = $_POST['wechatImg'];
        $data = "提交失败";
        if(!empty($qq) && !empty($email) && !empty($headImg) && !empty($wechatImg) && !empty($name)){
            //查看是否已经有个人资料
            $myInfoModel = ModelFactory::getModel("MyInfoModel");
            $myInfo = $myInfoModel->getMyInfo();
            if(!empty($myInfo)){
                //已经有个人资料，进行修改操作
                $b = $myInfoModel->updateMyInfo($name,$qq,$email,$headImg,$wechatImg);
                if(!empty($b)){
                    $data = "修改成功";
                }
            }else{
                //还没有个人资料，进行添加操作
                $b = $myInfoModel->addMyInfo($name,$qq,$email,$headImg,$wechatImg);
                if(!empty($b)){
                    $data = "添加成功";
                }
            }
        }
        echo $data;
    }


    /**
     * 加载个人资料
     */
    public function getMyInfoAction(){
        $myInfoModel = ModelFactory::getModel("MyInfoModel");
        $myInfo = $myInfoModel->getMyInfo();
        $name = "";
        $qq = "";
        $email = "";
        $head_img = "";
        $wechat = "";
        $page_view = 0;
        $blog_num = 0;
        if(!empty($myInfo)){
            $name = $myInfo['mname'];
            $qq = $myInfo['qq'];
            $email = $myInfo['email'];
            $wechat = $myInfo['wechat'];
            $head_img = $myInfo['head_img'];
            $page_view = $myInfo['page_view'];
            $blog_num = $myInfo['blog_num'];
        }
        require VIEW_PATH."setting_myInfo.php";
    }




}