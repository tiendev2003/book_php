<?php

class LoginController {

    public function login($error=null)
    {
        if($error == 1){
            $error = "Mật khẩu hoặc tên người dùng không chính xác";
        }
        require 'view/templates/LoginFrm.php';
    }

    public function dologin($username, $password)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($username);
        if($user == null){
            header('location:?route=login&error=1');
            exit();
        }
        $password_encode = $user->getPassword();
        if(!password_verify($password, $password_encode)){
            header('location:?route=login&error=1');
            exit();
        }
        session_start();
        $_SESSION['adminid'] = $user->getUserId();
        header('location:?route=dashboard');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['adminid']);
        header('location:?route=login');
    }

    public function profile($userid, $errorchangepass, $successchangpass, $successprofile)
    {
        require 'dao/UserDAO.php';
        if($errorchangepass == 1){
            $errorchangepass = "Tên đăng nhập không đúng!";
        }
        else if($errorchangepass == 2){
            $errorchangepass = "Nhập sai mật khẩu!";
        }
        else if($errorchangepass == 3){
            $errorchangepass = "Lỗi hệ thống!";
        }
        if($successchangpass == 1){
            $successchangpass = "Đổi mật khẩu thành công!";
        }
        if($successprofile == 1){
            $successprofile = "Lưu thông tin thành công!";
        }
        $user = (new UserDAO())->getUserById($userid);
        require 'view/templates/ProfileFrm.php';
    }

    public function changepass($username, $passold, $passnew)
    {
        require 'dao/UserDAO.php';
        $user = (new UserDAO())->checkUser($username);
        if($user == null){
            header('location:?route=profile&errorchangepass=1');
            exit();
        }
        $password_encode = $user->getPassword();
        if(!password_verify($passold, $password_encode)){
            header('location:?route=profile&errorchangepass=2');
            exit();
        }
        $passwordnew_encode = password_hash($passnew, PASSWORD_DEFAULT);
        $error = (new UserDAO())->updatePassword($user->getUserId(), $passwordnew_encode);
        if($error != null){
            header('location:?route=profile&errorchangepass=3');
            exit();
        }
        header('location:?route=profile&successchangpass=1');
    }

    public function profileedit($userid, $errorprofile)
    {
        require 'dao/UserDAO.php';
        if($errorprofile == 1){
            $errorprofile = "Lỗi hệ thống!";
        }
        
        $user = (new UserDAO())->getUserById($userid);
        require 'view/templates/ProfileEditFrm.php';
    }

    public function doprofileedit($params)
    {
        require 'dao/UserDAO.php';
        $check = (new UserDAO())->updateUser($params, $params['userid']);
        if($check == false){
            header('location:?route=profileedit&errorprofile=1');
            exit();
        }
        header('location:?route=profile&successprofile=1');
    }
}