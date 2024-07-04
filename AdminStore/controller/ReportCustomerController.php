<?php

class ReportCustomerController {
    public function reportcustomer($page, $datestart, $dateend, $sort, $keyword)
    {
        require 'dao/UserDAO.php';
        $total = (new UserDAO())->getCountCustomerReport($datestart, $dateend, $keyword);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($total / $numberOrderPage);
        $listcus = (new UserDAO())->getCustomerReport($datestart, $dateend, $sort, $currentPage, $numberOrderPage, $keyword);
        require 'view/templates/ReportCustomerFrm.php';
    }
}