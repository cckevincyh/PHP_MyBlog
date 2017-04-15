<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 12:47
 */

class LoginController extends BaseController{



    public function loginAction(){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        if(isset($username) && isset($pwd)){
            $userModel = ModelFactory::getModel("UserModel");
            //得到当前用户
            $user = $userModel->getUser();
            if($user['username']==trim($username) && $user['pwd']==$pwd) {
                echo 1;
            }else{
                echo -1;
            }

        }else{
            echo 0;
        }


    }
}