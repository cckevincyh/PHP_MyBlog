<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:41
 */

 class  ArticleTypeModel extends BaseModel{


     /**
      * 获取全部博客分类
      * @return array
      */
     public function getArticlTypes(){
         $sql = "SELECT * FROM tb_type";
         $stmt = $this->_dao->query($sql);
         $arr = array();
         while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
             $arr[] = $result;
         }
         return $arr;
     }


     /**
      * 分页获取博客分类
      * @param $pageCode 页码
      * @param $pageSize 每页记录数
      * @return array
      */
     public function getLimitArticleTypes($pageCode,$pageSize){
         $page = ($pageCode - 1) * $pageSize;
         $sql = "SELECT * FROM tb_type limit $page,$pageSize";
         $stmt = $this->_dao->prepare($sql);
         $arr = array();
         if(!empty($pageCode) && !empty($pageSize)){
             $stmt->execute();
             while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
                 $arr[] = $result;
             }
             $pageBean = array();   //装载分页信息
             //获取总记录数
             $sql = "SELECT count(*) FROM tb_type";
             $stmt = $this->_dao->prepare($sql);
             $stmt->execute();
             $pageBean['totalRecord'] = $stmt->fetchColumn();//得到总记录数
             $tp =  (int)($pageBean['totalRecord'] / $pageSize);
             $pageBean['totaPage'] = $pageBean['totalRecord']  % $pageSize == 0 ? $tp : $tp + 1;  //得到总页数
             $pageBean['pageCode'] = $pageCode; //当前页码
             $pageBean['pageSize'] = $pageSize; //每页记录数
             $pageBean['url'] = "p=back&c=ArticleType";
             $arr['pageBean'] = $pageBean;
         }
         return $arr;
     }


     /**
      * 根据ID得到指定的文章分类
      * @param $tid
      * @return bool|mixed
      */
     public function getArticleTypeById($tid){
         $sql = "SELECT * FROM tb_type WHERE tid= ?";
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
      * 增加文章分类
      * @param $typeName
      * @return bool
      */
     public function addArticleType($typeName){
        $sql = "INSERT INTO tb_type (tname) VALUES (?)";
         $stmt = $this->_dao->prepare($sql);
         if(!empty($typeName)){
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
         $sql = "UPDATE  tb_type SET tname = ? WHERE tid=?";
         $stmt = $this->_dao->prepare($sql);
         if(!empty($tid) && !empty($typeName)){
             $stmt->bindValue(1,$typeName);
             $stmt->bindValue(2,$tid);
             $result = $stmt->execute();
             return $result;
         }
         return false;
     }



     public  function  deleteArticleType($tid){
         $sql = "DELETE  FROM tb_type  WHERE tid=?";
         $stmt = $this->_dao->prepare($sql);
         if(!empty($tid)){
             $stmt->bindValue(1,$tid);
             $result = $stmt->execute();
             return $result;
         }
         return false;
     }
 }