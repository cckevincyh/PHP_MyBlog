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
         if(isset($tid)){
             $stmt->bindValue(1,$tid);
             $stmt->execute();
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
             return $result;
         }
         return false;
     }


 }