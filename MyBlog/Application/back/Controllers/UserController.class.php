<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */
class UserController extends BaseController {


    public function updatePwdAction(){

        $oldPwd = $_POST['oldPwd'];
        $newPwd = $_POST['newPwd'];
        $confirmPwd = $_POST['confirmPwd'];
        if (empty($oldPwd)) {
            echo "原密码不能为空";
        }else if(empty($newPwd)){
            echo "新密码不能为空";
        }else if(empty($confirmPwd)){
            echo "确认密码不能为空";
        }else{
            if($newPwd!=$confirmPwd){
                echo "确认密码不一致";
            }else {
                $userModel = ModelFactory::getModel("UserModel");
                //取出密码
                $user = $userModel->getUser();
                if ($user['pwd'] != $oldPwd) {
                    echo "原密码错误";
                } else {
                    //修改密码
                    $userModel->updatePwd($newPwd);
                    echo "修改成功";
                }
            }
        }
    }
}