<?php

class DashboardController {
    public function dashboard($type){
        require_once 'dao/ReportRevenueDAO.php';
        $countgenre = (new GenreDAO())->getCountGenre();
        $countgenreactive = (new GenreDAO())->getCountGenreActive();
        $countbook = (new BookDAO())->getCountAllBook();
        $countbooksale = (new BookDAO())->getCountBookSale();
        $countorder = (new OrderDAO())->getCountAllOrder();
        $countordersuccess = (new OrderDAO())->getCountOrderSuccess();
        $countcustomer = (new UserDAO())->getCountAllCustomer();
        $countcustomerorder = (new OrderDAO())->getCountCustomerOrder();
        $totalrevenue = (new ReportRevenueDAO())->getTotalRevenue();
        $listreportrevenue = (new ReportRevenueDAO())->getReportRevenue($type);
        $countcustomerold = (new OrderDAO())->getCountOrderByCustomerOld();
        $countcustomernew = (new OrderDAO())->getCountOrderByCustomerNew();
        $listgenre = (new GenreDAO())->getGenreOrderTop();
        $listbook = (new BookDAO())->getBookOrderTop();
        $listuser = (new UserDAO())->getCustomerOrderTop();
        require 'view/templates/DashboardFrm.php';
    }
}