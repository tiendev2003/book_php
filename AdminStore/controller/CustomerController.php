<?php

class CustomerController {
    public function customer($page, $keyword)
    {
        require 'dao/UserDAO.php';
        $totalcus = (new UserDAO())->getCountAllCustomer();
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($totalcus / $numberOrderPage);
        $listcustomer = (new UserDAO())->getCustomerByPage($currentPage, $numberOrderPage, $keyword);
        require 'view/templates/CustomerFrm.php';
    }

    public function customerview($userid, $page)
    {
        require 'dao/OrderDAO.php';
        $user = (new UserDAO())->getUserById($userid);
        $totalorder = (new OrderDAO())->getCountOrderByUserId($userid);
        $numberOrderPage = 5;
        $currentPage = $page;
        $totalPages = ceil($totalorder / $numberOrderPage);
        $listorder = (new OrderDAO())->getOrderByUserIdAndPage($userid, $currentPage, $numberOrderPage);
        require 'view/templates/CustomerViewFrm.php';
    }
}