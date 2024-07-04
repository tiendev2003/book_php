<?php

class RevenueController {
    public function reportrevenue($type, $page, $sort)
    {
        require_once 'dao/ReportRevenueDAO.php';
        $total = (new ReportRevenueDAO())->getCountReportRevenue($type);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($total / $numberOrderPage);
        $listrevenue = (new ReportRevenueDAO())->getReportRevenueByPage($type, $currentPage, $numberOrderPage, $sort);
        $listreportrevenue = (new ReportRevenueDAO())->getReportRevenue($type);
        require 'view/templates/ReportRevenueFrm.php';
    }

    public function reportrevenueview($year, $quanter, $month, $date, $page)
    {
        require_once 'dao/OrderDAO.php';
        $total = (new OrderDAO())->getCountOrderByReportRevenue($year, $quanter, $month, $date);
        $numberOrderPage = 5;
        $currentPage = $page;
        $totalPages = ceil($total / $numberOrderPage);
        $listorder = (new OrderDAO())->getOrderByReportRevenueAndPage($year, $quanter, $month, $date, $currentPage, $numberOrderPage);
        $total_cost = 0;
        $total_revenue = 0;
        $total_profit = 0;
        foreach($listorder as $order){
            foreach($order->getOrderDetail() as $orderdetail){
                $total_cost = $total_cost + $orderdetail->getBook()->getCostPrice() * $orderdetail->getQuantity();
            }
            $total_revenue = $total_revenue + $order->getTotalBook();
        }
        $total_profit = $total_revenue - $total_cost;
        require 'view/templates/ReportRevenueViewFrm.php';
    }
}