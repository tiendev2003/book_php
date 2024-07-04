<?php

class ReportBookController {
    public function reportbook($page, $datestart, $dateend, $cateid, $sort, $keyword)
    {
        require 'dao/BookDAO.php';
        if($cateid == 0){
            $cateid = null;
        }
        $total = (new BookDAO())->getCountBookReport($datestart, $dateend, $cateid, $keyword);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($total / $numberOrderPage);
        $listcate = (new CategoryDAO())->getAllCategory();
        $listbook = (new BookDAO())->getBookReport($datestart, $dateend, $currentPage, $numberOrderPage, $cateid, $sort, $keyword);
        require 'view/templates/ReportBookFrm.php';
        
    }

    public function reportbookview($page, $bookid)
    {
        require 'dao/BookDAO.php';
        $book = (new BookDAO())->getBookById($bookid);
        $total = (new BookDAO())->getCountBookReportView($bookid);
        $numberOrderPage = 10;
        $currentPage = $page;
        $totalPages = ceil($total / $numberOrderPage);
        $list = (new BookDAO())->getBookReportView($bookid, $currentPage, $numberOrderPage);
        require 'view/templates/ReportBookViewFrm.php';
    }
}