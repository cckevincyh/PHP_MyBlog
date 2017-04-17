<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/15
 * Time: 12:47
 */

class LoginController extends BaseController{



    public function loginAction() {
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        if (!empty($username) && !empty($pwd)) {
            $userModel = ModelFactory::getModel("UserModel");
            //得到当前用户
            $user = $userModel->getUser();
            if ($user['username'] == trim($username) && $user['pwd'] == $pwd) {
                //存入session
                session_start();
                $_SESSION['user'] = $user;
                echo 1;
            } else {
                echo 1;
            }

        } else {
            echo 0;
        }
    }



        public function logoutAction(){
            session_start();
            unset($_SESSION['user']);
            echo "<script>parent.location.href='/MyBlog/index.php'; </script>";
        }


}