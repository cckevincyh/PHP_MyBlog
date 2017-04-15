<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:50
 */
class UserController extends BaseController {


    function showAction(){
       $user =  ModelFactory::getModel("MyInfoModel");
        $result = $user->addBlogNum();
        var_dump( $result);

    }
}