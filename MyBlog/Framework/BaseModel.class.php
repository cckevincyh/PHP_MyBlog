<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 12:35
 */
class BaseModel{
    //这个，用于存储数据库工具类的实例（对象）

    protected $_dao = null;

    function __construct(){
        $config = array(
            'host' => "localhost",
            'port' => 3306,
            'user' => "root",
            'pwd' => "root",
            'charset' => "utf8",
            'dbname' => "myblog"
        );
        $this->_dao = MySQLDB::GetInstance($config);


    }
}