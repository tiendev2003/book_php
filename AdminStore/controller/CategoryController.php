<?php

class CategoryController {
    public function category($cateid, $cateeditid, $success, $successgenre, $genreid, $failedgenre, $failed)
    {
        require 'dao/CategoryDAO.php';
        require 'dao/GenreDAO.php';
        $listcategory = (new CategoryDAO())->getAllCategory();
        $cate = (new CategoryDAO())->getCategoryById($cateid);
        $listgenre = (new GenreDAO())->getGenreByCateid($cateid);
        if(isset($cateeditid)){
            $cateedit = (new CategoryDAO())->getCategoryById($cateeditid);
        }
        if(isset($genreid)){
            $genreedit = (new GenreDAO())->getGenreById($genreid);
        }
        if(isset($success)){
            if($success == 1){
                $success = "Bạn đã thêm danh mục thành công!";
            }
            else if($success == 2){
                $success = "Bạn đã sửa danh mục thành công!";
            }
            else if($success == 3){
                $success = "Bạn đã xóa danh mục thành công!";
            }
        }
        if(isset($successgenre)){
            if($successgenre == 1){
                $successgenre = "Bạn đã thêm thể loại thành công!";
            }
            else if($successgenre == 2){
                $successgenre = "Bạn đã sửa thể loại thành công!";
            }
            else if($successgenre == 3){
                $successgenre = "Bạn đã xóa thể loại thành công!";
            }
            
        }
        if(isset($failedgenre)){
            if($failedgenre == 1){
                $failedgenre = "Thể loại không thể xóa!";
            }
        }
        if(isset($failed)){
            if($failed == 1){
                $failed = "Danh mục có thể loại, không thể xóa!";
            }
        }
        require 'view/templates/CategoryFrm.php';
    }

    public function addcategory($catename)
    {
        require 'dao/CategoryDAO.php';
        (new CategoryDAO())->addCategory($catename);
        header('location:?route=category&success=1');
    }

    public function editcategory($id, $catename)
    {
        require 'dao/CategoryDAO.php';
        (new CategoryDAO())->editCategory($id, $catename);
        header('location:?route=category&success=2');
    }

    public function deletecategory($cateid)
    {
        require 'dao/CategoryDAO.php';
        $check = (new CategoryDAO())->deleteCategory($cateid);
        if($check==false){
            header('location:?route=category&cateid=' . $cateid . '&failed=1');
            exit();
        }
        header('location:?route=category&success=3');
    }

    public function addgenre($cateid, $namegenre)
    {
        require 'dao/GenreDAO.php';
        (new GenreDAO())->addGenre($cateid, $namegenre);
        header('location:?route=category&cateid=' . $cateid . '&successgenre=1');
    }

    public function editgemre($id, $cateid, $namegenre)
    {
        require 'dao/GenreDAO.php';
        (new GenreDAO())->editGenre($id, $cateid, $namegenre);
        header('location:?route=category&cateid=' . $cateid . '&successgenre=2');
    }

    public function deletegenre($cateid, $genreid)
    {
        require 'dao/GenreDAO.php';
        $check = (new GenreDAO())->deleteGenre($genreid);
        if($check==false){
            header('location:?route=category&cateid=' . $cateid . '&failedgenre=1');
            exit();
        }
        header('location:?route=category&cateid=' . $cateid . '&successgenre=3');
    }
}