<?php

require_once 'dao/Connect.php';
require_once 'model/User.php';

class UserDAO {
    public function checkUser($username, $password=null)
    {
        $sql = "select * from user where username = '$username'";
        if(isset($password)){
            $sql = $sql . " and password = '$password'";
        }
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new User($each);
    }

    public function insertUser($params)
    {
        $sql = "insert into user (roleid, fullname, username, password, email, phone) value ('2', '".$params['fullname']."', '" . $params['username'] . "', '" . $params['password'] . "', '" . $params['email'] . "', ' " . $params['phone'] . "')";
        $error = (new Connect())->execute($sql);
        return $error;
    }

    public function getUserById($id)
    {
        $sql = "select * from user where userid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new User($each);
    }

    public function getCountAllCustomer()
    {
        $sql = "SELECT count(*) FROM `user` WHERE `user`.`roleid` = 2";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getCustomerByPage($currentPage, $numberOrderPage, $keyword)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT * FROM `user` WHERE `user`.`roleid` = 2 ";
        $sql = $sql . "AND (`user`.`fullname` LIKE '%$keyword%' OR `user`.`username` LIKE '%$keyword%' OR `user`.`phone` LIKE '%$keyword%')";
        $sql = $sql . "ORDER BY userid LIMIT $numberOrderPage OFFSET $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new User($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCustomerOrderTop()
    {
        $sql = "SELECT `user`.*,
                SUM(`order`.`totalbook`) AS totalbook
                FROM `user` LEFT JOIN `order` ON `user`.`userid` = `order`.`userid`
                WHERE `order`.`requestcancel` = 0
                AND `order`.`deliverydate` IS NOT NULL
                GROUP BY `user`.`userid`
                ORDER BY totalbook DESC
                LIMIT 5";   
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new User($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCustomerReport($datestart, $dateend, $sort, $currentPage, $numberOrderPage, $keyword)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT `user`.*,
                SUM(`order`.`totalbook`) AS totalbook
                FROM `user` LEFT JOIN `order` ON `user`.`userid` = `order`.`userid`
                WHERE `order`.`requestcancel` = 0 
                AND `order`.`deliverydate` IS NOT NULL ";
        if($datestart != null){
            $sql = $sql . "AND `order`.`deliverydate` >= '$datestart' ";
        }
        if($dateend != null){
            $sql = $sql . "AND `order`.`deliverydate` <= '$dateend' ";
        }
        if($keyword != null){
            $sql = $sql . "AND (`user`.`fullname` LIKE '%$keyword%' OR `user`.`username` LIKE '%$keyword%' OR `user`.`phone` LIKE '%$keyword%')";
        }

        $sql = $sql . "GROUP BY `user`.`userid`
                        ORDER BY totalbook ";
        if($sort == 'down'){
            $sql = $sql . "DESC ";
        }
        else {
            $sql = $sql . "ASC ";
        }
        $sql = $sql . "LIMIT $numberOrderPage OFFSET $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new User($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountCustomerReport($datestart, $dateend, $keyword)
    {
        $sql = "SELECT count(*) FROM (SELECT `user`.*,
                SUM(`order`.`totalbook`) AS totalbook
                FROM `user` LEFT JOIN `order` ON `user`.`userid` = `order`.`userid`
                WHERE `order`.`requestcancel` = 0 
                AND `order`.`deliverydate` IS NOT NULL ";
        if($datestart != null){
            $sql = $sql . "AND `order`.`deliverydate` >= '$datestart' ";
        }
        if($dateend != null){
            $sql = $sql . "AND `order`.`deliverydate` <= '$dateend' ";
        }
        if($keyword != null){
            $sql = $sql . "AND (`user`.`fullname` LIKE '%$keyword%' OR `user`.`username` LIKE '%$keyword%' OR `user`.`phone` LIKE '%$keyword%')";
        }

        $sql = $sql . "GROUP BY `user`.`userid`
                        ORDER BY totalbook ";
        $sql = $sql . ") AS A";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function updateUser($params, $userid)
    {
        $sql = "UPDATE `user` SET `fullname`='" . $params['fullname'] . "', `email`='" . $params['email'] . "',`phone`='" . $params['phone'] . "',`city`='" . $params['city'] . "',`district`='" . $params['district'] . "',`ward`='" . $params['ward'] . "',`addressdetail`='" . $params['addressdetail'] . "' WHERE userid = '$userid'";
        return (new Connect())->execute($sql);
    }

    public function checkPassword($userid, $password)
    {
        $sql = "SELECT COUNT(*) FROM `user` WHERE userid = '$userid' AND password = '$password'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(*)'];
    }

    public function updatePassword($userid, $password)
    {
        $conn = (new Connect())->cnt();

        // Chuẩn bị câu truy vấn với các placeholder
        $stmt = $conn->prepare("UPDATE `user` SET `password`=? WHERE userid=?");

        // Ràng buộc các biến với các placeholder
        $stmt->bind_param("si", $password, $userid); // 'si' xác định rằng password là chuỗi và userid là số nguyên

        // Thực thi câu truy vấn
        $stmt->execute();

        // Kiểm tra lỗi và đóng statement
        $error = $stmt->error;
        $stmt->close();

        return $error;
    }

    public function getCountAllUser()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE roleid = 2";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(*)'];
    }
    
 
}