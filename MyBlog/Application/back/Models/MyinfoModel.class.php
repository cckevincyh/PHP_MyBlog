<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:37
 */

class MyInfoModel extends BaseModel{


    /**
     * 获取个人资料
     * @return bool
     */
    public function getMyInfo(){
        $sql = "SELECT * FROM tb_myinfo WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    /**
     * 添加个人资料
     * @param $name
     * @param $qq
     * @param $email
     * @param $head_img
     * @param $weChat
     * @return bool
     */
    public function  addMyInfo($name,$qq,$email,$head_img,$weChat){
        $sql = "INSERT INTO tb_myinfo  (mid, qq, email, head_img, wechat,mname) VALUES (1,?,?,?,?,?)";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($qq) && !empty($email) && !empty($weChat) && !empty($head_img)){
            $stmt->bindValue(1,$qq);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$head_img);
            $stmt->bindValue(4,$weChat);
            $stmt->bindValue(5,$name);
            $result = $stmt->execute();
            return $result;
        }
        return false;
    }


    /**
     * 修改个人资料
     * @param $name
     * @param $qq
     * @param $email
     * @param $head_img
     * @param $weChat
     * @return bool
     */
    public function updateMyInfo($name,$qq,$email,$head_img,$weChat){
        $sql = "UPDATE tb_myinfo SET qq=? , email=? , head_img=?  , wechat=?  ,mname=? WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($qq) && !empty($email) && !empty($weChat) && !empty($head_img)){
            $stmt->bindValue(1,$qq);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$head_img);
            $stmt->bindValue(4,$weChat);
            $stmt->bindValue(5,$name);
            $result = $stmt->execute();
            return $result;
        }
        return false;
    }


    /**
     * 增加访问量
     * @return bool
     */
    public function addPageView(){
        $sql = "UPDATE tb_myinfo SET page_view = page_view + 1 WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        $result = $stmt->execute();
        return $result;
    }


    /**
     * 增加博客数量
     * @return bool
     */
    public function addBlogNum(){
        $sql = "UPDATE tb_myinfo SET blog_num = blog_num + 1 WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        $result = $stmt->execute();
        return $result;
    }

    public function reduceBlogNum(){
        $sql = "UPDATE tb_myinfo SET blog_num = blog_num - 1 WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        $result = $stmt->execute();
        return $result;
    }

}

