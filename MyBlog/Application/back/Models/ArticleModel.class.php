<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:42
 */

class ArticleModel extends BaseModel {

    /**
     * 根据ID得到指定文章
     * @param $aid
     * @return bool|mixed
     */
    public function getArticleById($aid){
        $sql = "SELECT * FROM tb_article WHERE aid= ?";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($aid)){
            $stmt->bindValue(1,$aid);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        return false;
    }


    /**
     * 得到所有的文章
     * @return array
     */
    public function getAllArticles(){
        $sql = "SELECT * FROM tb_article";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $arr[] = $result;
        }
        return $arr;
    }

    public function addBlog($title,$type,$content){
        //获得当前时间 2017-4-20 00:00:00
        date_default_timezone_set('Asia/Shanghai');//设置时区
        $date = @date("Y-m-d H:i:s");//H大写H表示24小时制
        $sql = "INSERT INTO tb_article(uid, tid, atitle, acontent, atime) VALUES (1,?,?,?,?)";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($title) && !empty($type) && !empty($content)){
            $stmt->bindValue(1,$type);
            $stmt->bindValue(2,$title);
            $stmt->bindValue(3,$content);
            $stmt->bindValue(4,$date);
            $result = $stmt->execute();
            return $result;
        }
    }


    public function getLimitArticles($pageCode,$pageSize){

    }
}