<?php

class ProductController {
    public function product($page, $success, $failed, $keyword)
    {
        require 'dao/BookDAO.php';
        if($success == 1){
            $success = "Bạn đã thêm sản phẩm thành công!";
        }
        else if($success == 2){
            $success = "Bạn đã xóa sản phẩm thành công!";
        }
        else if($success == 3){
            $success = "Bạn đã sửa sản phẩm thành công!";
        }
        if($failed == 1){
            $failed = "Không thể xóa sản phẩm!";
        }
        $totalbook = (new BookDAO())->getCountBookByPage($keyword);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($totalbook / $numberOrderPage);
        $listbook = (new BookDAO())->getBookByPage($keyword, $page+1, $numberOrderPage);
        require 'view/templates/ProductFrm.php';
    }

    public function productview($bookid)
    {
        require 'dao/BookDAO.php';
        $book = (new BookDAO())->getBookById($bookid);
        require 'view/templates/ProductViewFrm.php';
    }

    public function addproduct($failed)
    {
        require 'dao/GenreDAO.php';
        if($failed == 1){
            $failed = "Lỗi thêm file ảnh!";
        }
        else if($failed == 2){
            $failed = "Lỗi hệ thống!";
        }
        $listgenre = (new GenreDAO())->getAllGenre();
        require 'view/templates/ProductAddFrm.php';
    }

    public function removeAccents($str, $extension) {
        $accents = array(
            'à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă','ằ','ắ','ặ','ẳ','ẵ',
            'è','é','ẹ','ẻ','ẽ','ê','ề','ế','ệ','ể','ễ',
            'ì','í','ị','ỉ','ĩ',
            'ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ','ờ','ớ','ợ','ở','ỡ',
            'ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ',
            'ỳ','ý','ỵ','ỷ','ỹ',
            'đ',
            'À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă','Ằ','Ắ','Ặ','Ẳ','Ẵ',
            'È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ',
            'Ì','Í','Ị','Ỉ','Ĩ',
            'Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ','Ờ','Ớ','Ợ','Ở','Ỡ',
            'Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ',
            'Ỳ','Ý','Ỵ','Ỷ','Ỹ',
            'Đ'
        );
        
        $noAccents = array(
            'a','a','a','a','a','a','a','a','a','a','a','a','a','a','a','a','a','a',
            'e','e','e','e','e','e','e','e','e','e','e',
            'i','i','i','i','i',
            'o','o','o','o','o','o','o','o','o','o','o','o','o','o','o','o','o','o',
            'u','u','u','u','u','u','u','u','u','u','u',
            'y','y','y','y','y',
            'd',
            'A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A','A',
            'E','E','E','E','E','E','E','E','E','E','E',
            'I','I','I','I','I',
            'O','O','O','O','O','O','O','O','O','O','O','O','O','O','O','O','O','O',
            'U','U','U','U','U','U','U','U','U','U','U',
            'Y','Y','Y','Y','Y',
            'D'
        );
        
        $originalString =  str_replace($accents, $noAccents, $str);
        $words = explode(" ", $originalString); // Tách chuỗi thành mảng các từ
    
        $newString = implode("_", $words); // Ghép lại các từ với dấu "_"
        $randomString = mt_rand(1000, 9999); 
        return $newString . $randomString . "." . $extension; // Output: "Qua_quut_day_co_mong_tay_nhon"
    }

    public function doaddproduct($params, $file)
    {
        require 'dao/BookDAO.php'; 
        $target_dir = "../img/";
        $name = $file['name'];
        $path_info = pathinfo($name);
        $extension = $path_info['extension'];
        $namenew = $this->removeAccents($params['bookname'], $extension);
        $target_file = $target_dir . $namenew;
        if (!move_uploaded_file($file["tmp_name"], $target_file)){
            header('location:?route=addproduct&failed=1');
            exit();
        }
        $check = (new BookDAO())->addBook($params, $target_file);
        if($check == false){
            header('location:?route=addproduct&failed=2');
            exit();
        }
        header('location:?route=product&success=1');
        
    }

    public function editproduct($bookid, $failed)
    {
        require 'dao/BookDAO.php';
        if($failed == 1){
            $failed = "Lỗi thêm file ảnh!";
        }
        else if($failed == 2){
            $failed = "Lỗi hệ thống!";
        }
        $listgenre = (new GenreDAO())->getAllGenre();
        $book = (new BookDAO())->getBookById($bookid);
        require 'view/templates/ProductEditFrm.php';
    }

    public function doeditproduct($params, $file)
    {
        require 'dao/BookDAO.php'; 
        $target_file = $params['image'];
        if($file != null) {
            unlink($params['image']);
            $target_dir = "../img/";
            $name = $file['name'];
            $path_info = pathinfo($name);
            $extension = $path_info['extension'];
            $namenew = $this->removeAccents($params['bookname'], $extension);
            $target_file = $target_dir . $namenew;
            if (!move_uploaded_file($file["tmp_name"], $target_file)){
                header('location:?route=editproduct&failed=1');
                exit();
            }
        }
        
        $check = (new BookDAO())->editBook($params, $target_file);
        if($check == false){
            header('location:?route=addproduct&failed=2');
            exit();
        }
        header('location:?route=product&success=3');
        
    }

    public function deleteproduct($bookid)
    {
        require 'dao/BookDAO.php';
        $book = (new BookDAO())->getBookById($bookid);
        unlink($book->getImage());
        $check = (new BookDAO())->deleteBook($bookid);
        if($check == false){
            header('location:?route=product&failed=1');
            exit();
        }
        header('location:?route=product&success=2');
    }

    
}