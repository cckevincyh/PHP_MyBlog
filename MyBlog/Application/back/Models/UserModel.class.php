<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:31
 */

class UserModel extends BaseModel{


    /**
     * 根据用户ID获取用户表数据
     * @return bool|mixed
     */
    public function getUser(){
        $sql = "SELECT * FROM tb_user WHERE uid= 1";
        $stmt = $this->_dao->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }





    /**
     * 修改密码
     * @return bool
     */
    public function updatePwd($pwd){
        $sql = "UPDATE tb_user SET pwd = ? WHERE uid = 1";
        $stmt = $this->_dao->prepare($sql);
        if(!empty($pwd)){
            $stmt->bindValue(1,$pwd);
            $result = $stmt->execute();
            return $result;
        }
        return false;
    }



}