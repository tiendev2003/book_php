<?php

class OrderController {

    public function order($statusorderid, $page)
    {
        require 'dao/OrderDAO.php';
        if($statusorderid == 0){
            $statusorderid = null;
        }
        $totalOrder = (new OrderDAO())->getCountOrderByStatus($statusorderid);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($totalOrder / $numberOrderPage);

        $orders = (new OrderDAO())->getOrderByStatusAndPage($statusorderid, $currentPage, $numberOrderPage);
        $size = count($orders);
        $liststatus = (new StatusOrderDAO())->getAllStatusOrder();
        require 'view/templates/OrderFrm.php';
    }

    public function transition($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        $statusorderid_old = (new OrderDAO())->updateOrderStatus($orderid);
        $note = null;
        if($statusorderid_old == 1){
            $note = "Đơn hàng của bạn đang được chuẩn bị!";
        }
        else if($statusorderid_old == 2){
            $note = "Đơn hàng đang được giao đến chỗ bạn!";
        }
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=order&statusorderid=' . $statusorderid_old);
    }

    public function orderview($orderid)
    {
        require 'dao/OrderDAO.php';
        $order = (new OrderDAO())->getOrderById($orderid);
        require 'view/templates/OrderViewFrm.php';
    }

    public function transitionview($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        $statusorderid_old = (new OrderDAO())->updateOrderStatus($orderid);
        $note = null;
        if($statusorderid_old == 1){
            $note = "Đơn hàng của bạn đang được chuẩn bị!";
        }
        else if($statusorderid_old == 2){
            $note = "Đơn hàng đang được giao đến chỗ bạn!";
        }
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=orderview&orderid=' . $orderid);
    }

    public function requestcancel()
    {
        require 'dao/OrderDAO.php';
        $orderrequestcancel = (new OrderDAO())->getOrderByRequestCancel();
        $size = count($orderrequestcancel);
        require 'view/templates/RequestCancelFrm.php';
    }

    public function approve($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        (new OrderDAO())->updateCancel($orderid);
        $note = "Bạn đã hủy đơn hàng thành công!";
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=orderview&orderid=' . $orderid);

    }

    public function deleterequest($userid, $orderid)
    {
        require 'dao/NotificationDAO.php';
        (new OrderDAO())->updateRequestCancel($orderid);
        $note = "Yêu cầu hủy hàng thất bại!";
        (new NotificationDAO())->insertNotification($userid, $note, $orderid);
        header('location:?route=orderview&orderid=' . $orderid);
    }
}