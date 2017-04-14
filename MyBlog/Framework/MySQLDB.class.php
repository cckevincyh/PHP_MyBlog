<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 12:45
 */

class MySQLDB{
    //定义一些属性，以存储连接数据库的6项基本信息
    private $host;
    private $port;
    private $user;
    private $pwd;
    private $charset;
    private $dbname;
    //实现单例第2步：用于存储唯一的单例对象：
    private static $pdo = null;

    static  function GetInstance($config){
        if( !(self::$pdo instanceof self) ){
            new self($config);
        }
        return self::$pdo;
    }


    //实现单例第1步：
    private function __construct($config){
        //先将这些基本的连接信息，保存起来！
        $this->host = !empty($config['host']) ? $config['host'] : "localhost";	//考虑空值情况，使用默认值代替
        $this->port = !empty($config['port']) ? $config['port'] : "3306" ;
        $this->user = !empty($config['user']) ? $config['user'] : "root" ;
        $this->pwd = !empty($config['pass']) ? $config['pass'] : "root" ;
        $this->charset = !empty($config['charset']) ? $config['charset'] : "utf8" ;
        $this->dbname = !empty($config['dbname']) ? $config['dbname'] : "myblog" ;

        //然后连接数据库！
        $dsn = "mysql:host=$this->host; port=$this->port; dbname=$this->dbname";
        $opt = array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names $this->charset");
        self::$pdo = new PDO($dsn, $this->user, $this->pwd, $opt);


    }


    //实现单例第4步：私有化这个克隆的魔术方法
    private function __clone(){}



}