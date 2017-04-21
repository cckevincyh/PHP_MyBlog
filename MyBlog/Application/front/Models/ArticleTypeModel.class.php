<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:41
 */

 class  ArticleTypeModel extends BaseModel{


     /**
      * 根据ID得到指定的文章分类
      * @param $tid
      * @return bool|mixed
      */
     public function getArticleTypeById($tid){
         $sql = "SELECT * FROM tb_type WHERE aid= ?";
         $stmt = $this->_dao->prepare($sql);
         if(!empty($tid)){
             $stmt->bindValue(1,$tid);
             $stmt->execute();
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
             return $result;
         }
         return false;
     }


     /**
      * 获取全部博客分类
      * @return array
      */
     public function getArticleTypesList(){
         $sql = "SELECT tb_type.tid,tb_type.tname,count(*) as num from tb_article,tb_type where tb_article.tid = tb_type.tid  group by tb_article.tid";
         $stmt = $this->_dao->query($sql);
         $arr = array();
         while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
             $arr[] = $result;
         }
         return $arr;
     }


 }