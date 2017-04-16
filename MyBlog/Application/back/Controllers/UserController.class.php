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
        if (!isset($oldPwd)) {
            echo -2;
        }else if(!isset($newPwd)){
            echo -3;
        }else if(!isset($confirmPwd)){
            echo -4;
        }else{
            if($newPwd!=$confirmPwd){
                echo -5;
            }else {
                $userModel = ModelFactory::getModel("UserModel");
                //取出密码
                $user = $userModel->getUser();
                if ($user['pwd'] != $oldPwd) {
                    echo -1;
                } else {
                    //修改密码
                    $userModel->updatePwd($newPwd);
                    echo 1;
                }
            }
        }
    }
}