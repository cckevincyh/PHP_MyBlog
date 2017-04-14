<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */
class UserController extends BaseController {


    function showAction(){
       $user =  ModelFactory::getModel("UserModel");
        $result = $user->getUserById(1);
        print_r( $result);

    }
}