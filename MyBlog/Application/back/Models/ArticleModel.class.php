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


    public function getLimitArticles($pageCode,$pageSize){

    }
}