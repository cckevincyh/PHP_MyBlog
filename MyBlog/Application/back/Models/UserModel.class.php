<?php
/**
 * Created by PhpStorm.
 * User: c
 * Date: 2017/4/13
 * Time: 13:31
 */

class UserModel extends BaseModel{


    public function getUserById($uid){
        $sql = "select * from tb_user where uid= ?";
        $stmt = $this->_dao->prepare($sql);
        if(isset($uid)){
            $stmt->bindValue(1,$uid);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        return false;
    }


    public function getUserByName($name){
        $sql = "select * from tb_user where username= ?";
        $stmt = $this->_dao->prepare($sql);
        if(isset($name)){
            $stmt->bindValue(1,$name);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        return false;
    }

}