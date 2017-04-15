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

     /**
      * 增加文章分类
      * @param $typeName
      * @return bool
      */
     public function addArticleType($typeName){
        $sql = "INSERT INTO tb_type (tname) VALUES (?)";
         $stmt = $this->_dao->prepare($sql);
         if(isset($typeName)){
             $stmt->bindValue(1,$typeName);
             $result = $stmt->execute();
             return $result;
         }
         return false;
     }


     /**
      * 修改文章分类
      * @param $tid
      * @param $typeName
      * @return bool
      */
     public function updateArticleType($tid,$typeName){
         $sql = "UPDATE  tb_type SET tname = ? WHERE tname=?";
         $stmt = $this->_dao->prepare($sql);
         if(isset($tid) && isset($typeName)){
             $stmt->bindValue(1,$tid);
             $stmt->bindValue(2,$typeName);
             $result = $stmt->execute();
             return $result;
         }
         return false;
     }
 }