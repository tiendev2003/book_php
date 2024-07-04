<?php

date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once 'controller/LoginController.php';
require_once 'controller/OrderController.php';
require_once 'controller/DashboardController.php';
require_once 'controller/CategoryController.php';
require_once 'controller/ProductController.php';
require_once 'controller/CustomerController.php';
require_once 'controller/RevenueController.php';
require_once 'controller/ReportBookController.php';
require_once 'controller/ReportCustomerController.php';

$route = $_GET['route'] ?? 'login';
session_start();

switch($route){
    case 'login':
        $error = null;
        if(isset($_GET['error'])){
            $error = $_GET['error'];
        }
        (new LoginController())->login($error);
        break;
    case 'dologin':
        (new LoginController())->dologin($_POST['username'], $_POST['password']);
        break;
    case 'logout':
        (new LoginController())->logout();
        break;
    case 'profile':
        $errorchangepass = null;
        $successchangpass = null;
        $successprofile = null;
        if(isset($_GET['errorchangepass'])){
            $errorchangepass = $_GET['errorchangepass'];
        }
        if(isset($_GET['successchangpass'])){
            $successchangpass = $_GET['successchangpass'];
        }
        if(isset($_GET['successprofile'])){
            $successprofile = $_GET['successprofile'];
        }
        (new LoginController())->profile($_SESSION['adminid'], $errorchangepass, $successchangpass, $successprofile);
        break;
    case 'profileedit':
        $errorprofile = null;
        if(isset($_GET['errorprofile'])){
            $errorprofile = $_GET['errorprofile'];
        }
        (new LoginController())->profileedit($_SESSION['adminid'], $errorprofile);
        break;
    case 'doprofileedit':
        (new LoginController())->doprofileedit($_POST);
        break;

    case 'changepass':
        (new LoginController())->changepass($_GET['username'], $_POST['passwordold'], $_POST['passwordnew']);
        break;
    case 'dashboard':
        $type = 0;
        if(isset($_POST['type'])){
            $type = $_POST['type'];
        }
        (new DashboardController())->dashboard($type);
        break;
    case 'category':
        $cateid = 1;
        $cateeditid = null;
        $success = null;
        $successgenre = null;
        $genreid = null;
        $failedgenre = null;
        $failed = null; 
        if(isset($_GET['cateid'])){
            $cateid = $_GET['cateid'];
        }
        if(isset($_GET['cateeditid'])){
            $cateeditid = $_GET['cateeditid'];
            $cateid = $cateeditid;
        }
        if(isset($_GET['success'])){
            $success = $_GET['success'];
        }
        if(isset($_GET['successgenre'])){
            $successgenre = $_GET['successgenre'];
        }
        if(isset($_GET['genreid'])){
            $genreid = $_GET['genreid'];
        }
        if(isset($_GET['failedgenre'])){
            $failedgenre = $_GET['failedgenre'];
        }
        if(isset($_GET['failed'])){
            $failed = $_GET['failed'];
        }
        (new CategoryController())->category($cateid, $cateeditid, $success, $successgenre, $genreid, $failedgenre, $failed);
        break;
    case 'addcategory':
        (new CategoryController())->addcategory($_POST['catename']);
        break;
    case 'editcategory':
        (new CategoryController())->editcategory($_POST['id'], $_POST['name']);
        break;
    case 'deletecategory':
        (new CategoryController())->deletecategory($_GET['cateid']);
        break;
    case 'addgenre':
        (new CategoryController())->addgenre($_POST['cateid'], $_POST['namegenre']);
        break;
    case 'editgemre':
        (new CategoryController())->editgemre($_POST['id'], $_POST['cateid'], $_POST['namegenre']);
        break;
    case 'deletegenre':
        (new CategoryController())->deletegenre($_GET['cateid'], $_GET['genreid']);
        break;
    case 'product':
        $page = 0;
        $success = null;
        $failed = null;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        if(isset($_GET['success'])){
            $success = $_GET['success'];
        }
        if(isset($_GET['failed'])){
            $failed = $_GET['failed'];
        }
        $keyword = null;
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }
        (new ProductController())->product($page, $success, $failed, $keyword);
        break;

    case 'productview':
        (new ProductController())->productview($_GET['bookid']);
        break;

    case 'addproduct':
        $failed = null;
        if(isset($_GET['failed'])){
            $failed = $_GET['failed'];
        }
        (new ProductController())->addproduct($failed);
        break;
    
    case 'doaddproduct':
        $file = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
                $file = $_FILES['image'];
            }
        }
        // var_dump($file);
        // array(5) { ["name"]=> string(32) "Screenshot 2024-05-13 232213.png" 
        //     ["type"]=> string(9) "image/png" 
        //     ["tmp_name"]=> string(24) "D:\XAMPP\tmp\php867D.tmp" 
        //     ["error"]=> int(0) 
        //     ["size"]=> int(26094) }
        // die();
        (new ProductController())->doaddproduct($_POST, $file);
        break;

    case 'editproduct':
        $failed = null;
        if(isset($_GET['failed'])){
            $failed = $_GET['failed'];
        }
        (new ProductController())->editproduct($_GET['bookid'], $failed);
        break;

    case 'doeditproduct':
        $file = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_FILES['imagenew']) && $_FILES['imagenew']['error'] === UPLOAD_ERR_OK){
                $file = $_FILES['imagenew'];
            }
        }
        (new ProductController())->doeditproduct($_POST, $file);
        break;

    case 'deleteproduct':
        (new ProductController())->deleteproduct($_GET['bookid']);
        break;

    case 'customer':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $keyword = null;
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }
        (new CustomerController())->customer($page, $keyword);
        break;
    case 'customerview':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        (new CustomerController())->customerview($_GET['userid'], $page);
        break;

    case 'order':
        if(isset($_SESSION['adminid'])){
            $statusorderid = null;
            $page = 0;
            if(isset($_POST['statusorderid'])){
                $statusorderid = $_POST['statusorderid'];
            }
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            if(isset($_GET['statusorderid'])){
                $statusorderid = $_GET['statusorderid'];
            }
            (new OrderController())->order($statusorderid, $page);
        }
        else {
            (new LoginController())->login();
        }
        break;
    case 'transition':
        (new OrderController())->transition($_GET['userid'], $_GET['orderid']);
        break;
    case 'orderview':
        (new OrderController())->orderview($_GET['orderid']);
        break;
    case 'transitionview':
        (new OrderController())->transitionview($_GET['userid'], $_GET['orderid']);
        break;
    case 'requestcancel':
        (new OrderController())->requestcancel();
        break;
    case 'approve':
        (new OrderController())->approve($_GET['userid'], $_GET['orderid']);
        break;
    case 'deleterequest':
        (new OrderController())->deleterequest($_GET['userid'], $_GET['orderid']);
        break;
    case 'reportrevenue':
        $type = 0;
        if(isset($_POST['type'])){
            $type = $_POST['type'];
        }
        if(isset($_GET['type'])){
            $type = $_GET['type'];
        }
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $sort = 'down';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
        }
        (new RevenueController())->reportrevenue($type, $page, $sort);
        break;
    case 'reportrevenueview':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        (new RevenueController())->reportrevenueview($_GET['year'], $_GET['quanter'],$_GET['month'], $_GET['date'], $page);
        break;
    case 'reportbook':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $datestart = null;
        $dateend = null;
        if(isset($_POST['datestart'])){
            $datestart = $_POST['datestart'];
        }
        if(isset($_POST['dateend'])){
            $dateend = $_POST['dateend'];
        }
        $cateid = 0;
        if(isset($_POST['cateid'])){
            $cateid = $_POST['cateid'];
        }
        $sort = 'down';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
        }
        $keyword = null;
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }
        (new ReportBookController())->reportbook($page, $datestart, $dateend, $cateid, $sort, $keyword);
        break;
    case 'reportbookview':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        (new ReportBookController())->reportbookview($page, $_GET['bookid']);
        break;
    case 'reportcustomer':
        $page = 0;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        $datestart = null;
        $dateend = null;
        if(isset($_POST['datestart'])){
            $datestart = $_POST['datestart'];
        }
        if(isset($_POST['dateend'])){
            $dateend = $_POST['dateend'];
        }
        $sort = 'down';
        if(isset($_GET['sort'])){
            $sort = $_GET['sort'];
        }
        $keyword = null;
        if(isset($_POST['keyword'])){
            $keyword = $_POST['keyword'];
        }
        (new ReportCustomerController())->reportcustomer($page, $datestart, $dateend, $sort, $keyword);
        break;
}