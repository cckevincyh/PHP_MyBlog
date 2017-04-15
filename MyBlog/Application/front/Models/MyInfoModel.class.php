<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:37
 */

class MyInfoModel extends BaseModel{

    /**
     * 得到个人资料
     * @return mixed
     */
    public function getMyInfoB(){
        $sql = "SELECT * FROM tb_myinfo WHERE mid= 1";
        $stmt = $this->_dao->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

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


}

