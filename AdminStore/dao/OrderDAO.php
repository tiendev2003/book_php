<?php

require_once 'dao/Connect.php';
require_once 'model/Order.php';

class OrderDAO {

    public function getOrderById($id)
    {
        $sql = "select * from `order` where orderid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Order($each);
    }

    public function getAllOrder()
    {
        $sql = "SELECT * FROM `order` ORDER BY orderid DESC";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getOrderByStatusAndPage($statusorderid=null, $currentPage, $numberOrderPage)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT `order`.`orderid`, `order`.`userid`, `order`.`orderdate`, `order`.`statusorderid`, `order`.`total` FROM `order`  WHERE NOT(requestcancel = 1 AND statusorderid = 2) "; 
        if(isset($statusorderid)){
            $sql = $sql . " AND statusorderid = '$statusorderid' ";
        }
        $sql = $sql . " ORDER BY orderid DESC limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountOrderByStatus($statusorderid=null)
    {
        $sql = "SELECT count(*) FROM `order` WHERE NOT(requestcancel = 1 ) "; 
        if(isset($statusorderid)){
            $sql = $sql . "AND statusorderid = '$statusorderid'";
        }
        $sql = $sql . " ORDER BY orderid DESC";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getOrderByUserIdAndPage($userid, $currentPage, $numberOrderPage)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT `order`.`orderid`, `order`.`orderdate`, `order`.`statusorderid`, `order`.`totalbook` 
                FROM `order` WHERE `order`.`userid` = '$userid' 
                ORDER BY `order`.`orderid` DESC limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getOrderByReportRevenueAndPage($year, $quanter=null, $month=null, $date=null, $currentPage, $numberOrderPage)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT * FROM `order` WHERE YEAR(`order`.deliverydate) = '$year'";
        if($quanter != null){
            $sql = $sql . " AND QUARTER(`order`.deliverydate) = '$quanter'";
        }
        if($month != null){
            $sql = $sql . " AND MONTH(`order`.deliverydate) = '$month'";
        }
        if($date != null){
            $sql = $sql . " AND DATE(`order`.deliverydate) = '$date'";
        }
        $sql = $sql . " limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountOrderByUserId($userid)
    {
        $sql = "SELECT count(*) FROM `order` WHERE `order`.`userid` = '$userid'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getCountAllOrder()
    {
        $sql = "SELECT count(*) FROM `order`";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getCountCustomerOrder()
    {
        $sql = "SELECT COUNT(userid)
        FROM (
            SELECT `order`.`userid` AS userid
            FROM `order`
            GROUP BY `order`.`userid`
        ) AS subquery;";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(userid)'];
    }

    public function getCountOrderByCustomerOld()
    {
        $sql = "SELECT COUNT(userid) AS total_customers
        FROM (
            SELECT `order`.`userid` AS userid, COUNT(`order`.`orderid`) AS total_orders
            FROM `order`
            GROUP BY `order`.`userid`
            HAVING total_orders > 1
        ) AS subquery;";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['total_customers'];
    }

    public function getCountOrderByCustomerNew()
    {
        $sql = "SELECT COUNT(userid) AS total_customers
        FROM (
            SELECT `order`.`userid` AS userid, COUNT(`order`.`orderid`) AS total_orders
            FROM `order`
            GROUP BY `order`.`userid`
            HAVING total_orders = 1
        ) AS subquery;";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['total_customers'];
    }

    public function getCountOrderSuccess()
    {
        $sql = "SELECT count(*) FROM `order` WHERE `order`.`deliverydate` IS NOT NULL";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getOrderByRequestCancel()
    {
        $sql = "SELECT * FROM `order` WHERE statusorderid != '5' and requestcancel = 1";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Order($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountOrderByRequestCancel()
    {
        $sql = "SELECT count(*) FROM `order` WHERE statusorderid != '5' and requestcancel = 1";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getCountOrderByReportRevenue($year, $quanter=null, $month=null, $date=null)
    {
        $sql = "SELECT count(*) FROM `order` WHERE YEAR(`order`.deliverydate) = '$year'";
        if($quanter != null){
            $sql = $sql . " AND QUARTER(`order`.deliverydate) = '$quanter'";
        }
        if($month != null){
            $sql = $sql . " AND MONTH(`order`.deliverydate) = '$month'";
        }
        if($date != null){
            $sql = $sql . " AND DATE(`order`.deliverydate) = '$date'";
        }
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function updateOrderStatus($orderid)
    {
        $order = $this->getOrderById($orderid);
        $statusorderid = $order->getStatusOrder()->getStatusOrderId();
        $statusorderid_old = $statusorderid;
        if($statusorderid < 3){
            $statusorderid = $statusorderid + 1;
        }
        $sql = "UPDATE `order` SET `statusorderid` = '$statusorderid' ";
        if($statusorderid_old == 2){
            $datenoti = date("Y-m-d H:i:s");
            $sql = $sql . ", `shipdate`= '$datenoti' ";
        }
        $sql = $sql . "WHERE `order`.`orderid` = '$orderid'";
        (new Connect())->execute($sql);
        if($statusorderid == 2){
            foreach($order->getOrderDetail() as $orderdetail){
                (new BookDAO())->updateQuantity($orderdetail->getBook()->getBookId(), $orderdetail->getBook()->getQuantity() - $orderdetail->getQuantity());
                (new BookDAO())->updateQuantitySale($orderdetail->getBook()->getBookId(), $orderdetail->getBook()->getQuantitySale() + $orderdetail->getQuantity());
            }
        }
        return $statusorderid_old;
    }

    public function updateStatusFeedback($orderid)
    {
        $sql = "update `order` set statusfeedback = '1' where orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function updateCancel($orderid)
    {
        $order = $this->getOrderById($orderid);
        foreach($order->getOrderDetail() as $orderdetail){
            (new BookDAO())->updateQuantity($orderdetail->getBook()->getBookId(), $orderdetail->getBook()->getQuantity() + $orderdetail->getQuantity());
            (new BookDAO())->updateQuantitySale($orderdetail->getBook()->getBookId(), $orderdetail->getBook()->getQuantitySale() - $orderdetail->getQuantity());
        }
        $sql = "UPDATE `order` SET `statusorderid`='5' WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }

    public function updateRequestCancel($orderid)
    {
        $sql = "UPDATE `order` SET `requestcancel`='0' WHERE orderid = '$orderid'";
        return (new Connect())->execute($sql);
    }
}