<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:37
 */

class MyInfoModel extends BaseModel{


    /**
     * 修改个人资料
     * @param $qq
     * @param $email
     * @param $weChat
     * @return bool
     */
    public function updateMyInfo($qq,$email,$weChat){
        $sql = "UPDATE tb_myinfo SET qq=? AND email=? AND wechat=? WHERE mid = 1";
        $stmt = $this->_dao->prepare($sql);
        if(isset($qq) && isset($email) && isset($weChat)){
            $stmt->bindValue(1,$qq);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$weChat);
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

}

