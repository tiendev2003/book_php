<?php

require_once 'dao/Connect.php';
require_once 'model/ReportRevenue.php';

class ReportRevenueDAO {
    public function getReportRevenue($type)
    {
        $sql = "SELECT * from (SELECT YEAR(`order`.deliverydate) AS delivery_year, ";
        switch($type) {
            case 0:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    MONTH(`order`.deliverydate) AS delivery_month,
                                    DATE(`order`.deliverydate) AS delivery_date,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(`order`.`totalbook`) AS total_revenue,
                                    (SUM(`order`.`totalbook`) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY DATE(`order`.deliverydate)
                                ORDER BY DATE(`order`.deliverydate) DESC LIMIT 10
                                ) A ORDER BY delivery_date ASC";  
                break;
            case 1:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    MONTH(`order`.deliverydate) AS delivery_month,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(`order`.`totalbook`) AS total_revenue,
                                    (SUM(`order`.`totalbook`) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY MONTH(`order`.deliverydate)
                                ORDER BY MONTH(`order`.deliverydate) DESC LIMIT 10
                                ) A ORDER BY delivery_month ASC";  
                break;
            case 2:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(`order`.`totalbook`) AS total_revenue,
                                    (SUM(`order`.`totalbook`) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY QUARTER(`order`.deliverydate)
                                ORDER BY QUARTER(`order`.deliverydate) DESC LIMIT 10
                                ) A ORDER BY delivery_quarter ASC";  
                break;
            case 3:
                $sql = $sql . " SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(`order`.`totalbook`) AS total_revenue,
                                    (SUM(`order`.`totalbook`) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY YEAR(`order`.deliverydate) LIMIT 10
                                ) A ORDER BY delivery_year ASC";  
                break;
        }
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new ReportRevenue($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getReportRevenueByPage($type, $currentPage, $numberOrderPage, $sort)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT YEAR(`order`.deliverydate) AS delivery_year, ";
        switch($type) {
            case 0:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    MONTH(`order`.deliverydate) AS delivery_month,
                                    DATE(`order`.deliverydate) AS delivery_date,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(book.saleprice * orderdetail.quantity) AS total_revenue,
                                    (SUM(book.saleprice * orderdetail.quantity) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY DATE(`order`.deliverydate)
                                order by DATE(`order`.deliverydate) ";  
                break;
            case 1:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    MONTH(`order`.deliverydate) AS delivery_month,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(book.saleprice * orderdetail.quantity) AS total_revenue,
                                    (SUM(book.saleprice * orderdetail.quantity) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY MONTH(`order`.deliverydate)
                                order by MONTH(`order`.deliverydate) ";  
                break;
            case 2:
                $sql = $sql . " QUARTER(`order`.deliverydate) AS delivery_quarter,
                                    SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(book.saleprice * orderdetail.quantity) AS total_revenue,
                                    (SUM(book.saleprice * orderdetail.quantity) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY QUARTER(`order`.deliverydate)
                                order by QUARTER(`order`.deliverydate) ";  
                break;
            case 3:
                $sql = $sql . " SUM(book.costprice * orderdetail.quantity) AS total_cost,
                                    SUM(book.saleprice * orderdetail.quantity) AS total_revenue,
                                    (SUM(book.saleprice * orderdetail.quantity) - SUM(book.costprice * orderdetail.quantity)) AS total_profit
                                FROM 
                                    `order`
                                LEFT JOIN 
                                    orderdetail ON `order`.`orderid` = `orderdetail`.`orderid`
                                LEFT JOIN 
                                    `book` ON `orderdetail`.`bookid` = `book`.`bookid`
                                WHERE 
                                    `order`.`deliverydate` IS NOT NULL
                                GROUP BY YEAR(`order`.deliverydate)
                                order by YEAR(`order`.deliverydate) ";  
                break;
        }
        if($sort == 'down'){
            $sql = $sql . "DESC ";
        }
        else {
            $sql = $sql . "ASC ";
        }
        $sql = $sql . " limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new ReportRevenue($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountReportRevenue($type)
    {
        $sql = "SELECT COUNT(*) FROM (SELECT DISTINCT ";
        switch($type) {
            case 0:
                $sql = $sql . " date";  
                break;
            case 1:
                $sql = $sql . " MONTH";  
                break;
            case 2:
                $sql = $sql . " QUARTER";  
                break;
            case 3:
                $sql = $sql . " YEAR";  
                break;
        }
        $sql = $sql . "(`order`.`deliverydate`) AS daterevenue FROM `order` WHERE `order`.`deliverydate` IS NOT NULL) AS A";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(*)'];
    }
    
    public function getTotalRevenue()
    {
        $sql = "SELECT SUM(`order`.`totalbook`) AS total FROM `order` WHERE `order`.`deliverydate` IS NOT NULL;";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['total'];
    }
}