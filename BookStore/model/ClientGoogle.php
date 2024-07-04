<?php

require 'google-api/vendor/autoload.php';


function ClientGoogle(){
    // Lấy những giá trị này từ https://console.google.com
    $client_id = ''; // Client ID
    $client_secret = ''; // Client secret
    $redirect_uri = 'http://localhost/BookStore/GoogleController.php'; // URL tại Authorised redirect URIs
    $client = new Google_Client();
    // cài đặt các giá trị của Client ID, Client Secret và Redirect URI cho đối tượng client
    $client->setClientId($client_id);
    $client->setClientSecret($client_secret);
    $client->setRedirectUri($redirect_uri);
    // thêm các phạm vi quyền truy cập mà ứng dụng của bạn muốn yêu cầu từ người dùng khi họ đăng nhập bằng Google
    $client->addScope('email');
    $client->addScope('profile');
    return $client;

}