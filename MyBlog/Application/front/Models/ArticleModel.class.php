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
        $sql = "SELECT tb_article.aid,tb_article.mid,tb_article.page_view,tb_article.img,tb_article.like_num,
                tb_article.tid,tb_article.atitle,tb_article.acontent,tb_article.atime,tb_myinfo.mname,tb_type.tname
                FROM tb_article,tb_type,tb_myinfo 
                WHERE tb_myinfo.mid = tb_article.mid 
                AND tb_article.tid = tb_type.tid AND tb_article.aid= ?";
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
        $page = ($pageCode - 1) * $pageSize;
        $sql = "SELECT tb_article.aid,tb_article.mid,tb_article.page_view,tb_article.img,tb_article.like_num,
                tb_article.tid,tb_article.atitle,tb_article.acontent,tb_article.atime,tb_myinfo.mname,tb_type.tname
                FROM tb_article,tb_type,tb_myinfo 
                WHERE tb_myinfo.mid = tb_article.mid 
                and tb_article.tid = tb_type.tid 
                limit $page,$pageSize";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        if(!empty($pageCode) && !empty($pageSize)){
            while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result['acontent'] = urldecode($result['acontent']);   //URL解码，解出来是带有样式的html文本
                //strip_tags — 从字符串中去除 HTML 和 PHP 标记
                $result['content'] = strip_tags($result['acontent']);   //得到存文本的内容
                $arr[] = $result;
            }
            $pageBean = array();   //装载分页信息
            //获取总记录数
            $sql = "SELECT count(*) FROM tb_article";
            $stmt = $this->_dao->query($sql);
            $pageBean['totalRecord'] = $stmt->fetchColumn();//得到总记录数
            $tp =  (int)($pageBean['totalRecord'] / $pageSize);
            $pageBean['totaPage'] = $pageBean['totalRecord']  % $pageSize == 0 ? $tp : $tp + 1;  //得到总页数
            $pageBean['pageCode'] = $pageCode; //当前页码
            $pageBean['pageSize'] = $pageSize; //每页记录数
            $pageBean['url'] = "c=Article&a=getLimitBlogs";
            $arr['pageBean'] = $pageBean;
        }
        return $arr;
    }


    public function addPageView($aid){
        $sql = "UPDATE tb_article SET page_view = page_view + 1 WHERE aid = ?";
        if(!empty($aid)){
            $stmt = $this->_dao->prepare($sql);
            $stmt->bindValue(1,$aid);
            $result = $stmt->execute();
        }
    }


    public function likeById($aid){
        $sql = "UPDATE tb_article SET like_num = like_num + 1 WHERE aid = ?";
        if(!empty($aid)){
            $stmt = $this->_dao->prepare($sql);
            $stmt->bindValue(1,$aid);
            $result = $stmt->execute();
           return $result;
        }else{
           return false;
        }
    }

    public function watchList($size){
        $sql = "SELECT aid,atitle,page_view FROM tb_article ORDER  BY page_view DESC LIMIT 0,$size";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $arr[] = $result;
        }
        return $arr;
    }

    public function likeList($size){
        $sql = "SELECT aid,atitle,like_num FROM tb_article ORDER  BY like_num DESC LIMIT 0,$size";
        $stmt = $this->_dao->query($sql);
        $arr = array();
        while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
            $arr[] = $result;
        }
        return $arr;
    }

    /**
     * 根据分类找到相关的博文
     * @param $type
     * @param $pageCode
     * @param $pageSize
     * @return array
     */
    public function getArticleByType($type,$pageCode,$pageSize){
        $page = ($pageCode - 1) * $pageSize;
        $sql = "SELECT tb_article.aid,tb_article.mid,tb_article.page_view,tb_article.img,tb_article.like_num,
                tb_article.tid,tb_article.atitle,tb_article.acontent,tb_article.atime,tb_myinfo.mname,tb_type.tname
                FROM tb_article,tb_type,tb_myinfo 
                WHERE tb_myinfo.mid = tb_article.mid 
                and tb_article.tid = tb_type.tid and tb_type.tid=?
                limit $page,$pageSize";
        $arr = array();
        if(!empty($pageCode) && !empty($pageSize) && !empty($type)){
            $stmt = $this->_dao->prepare($sql);
            $stmt->bindValue(1,$type);
            $stmt->execute();
            while (  $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
                $result['acontent'] = urldecode($result['acontent']);   //URL解码，解出来是带有样式的html文本
                //strip_tags — 从字符串中去除 HTML 和 PHP 标记
                $result['content'] = strip_tags($result['acontent']);   //得到存文本的内容
                $arr[] = $result;
            }
            $pageBean = array();   //装载分页信息
            //获取总记录数
            $sql = "SELECT count(*) FROM tb_article WHERE tid=?";
            $stmt = $this->_dao->prepare($sql);
            $stmt->bindValue(1,$type);
            $stmt->execute();
            $pageBean['totalRecord'] = $stmt->fetchColumn();//得到总记录数
            $tp =  (int)($pageBean['totalRecord'] / $pageSize);
            $pageBean['totaPage'] = $pageBean['totalRecord']  % $pageSize == 0 ? $tp : $tp + 1;  //得到总页数
            $pageBean['pageCode'] = $pageCode; //当前页码
            $pageBean['pageSize'] = $pageSize; //每页记录数
            $pageBean['url'] = "c=Article&a=getArticleByType&type=$type";
            $arr['pageBean'] = $pageBean;
        }
        return $arr;
    }

}