<?php

require_once 'dao/Connect.php';
require_once 'model/Book.php';
require_once 'model/ReportProduct.php';

class BookDAO {
    public function getBookById($id)
    {
        $sql = "select * from book where bookid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Book($each);
    }

    public function getAllBook()
    {
        $sql = "select * from book";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getAllBookLimit8()
    {
        $sql = "select * from book limit 8";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookByCateidLimit8($cateid)
    {
        $sql = "select * from book, genre, category WHERE book.genreid = genre.genreid AND genre.cateid = category.cateid AND category.cateid = '$cateid' LIMIT 8";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountAllBook()
    {
        $sql = "select count(*) from book";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getCountBookSale()
    {
        $sql = "select count(*) from book WHERE `book`.`quantity` > 0";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByPage($keyword, $page, $numberbook)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "select * from book ";
        if($keyword != null){
            $sql = $sql . "WHERE bookname LIKE '%$keyword%' ";
        }
        $sql = $sql . "order by bookid desc limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByPage($keyword)
    {
        $sql = "select count(*) from book ";
        if($keyword != null){
            $sql = $sql . "WHERE bookname LIKE '%$keyword%' ";
        }
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByIdAndKey($cateid, $genreid, $key)
    {
        $sql = "select * from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $sql = $sql . "bookname like '%$key%;'";
        }
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByIdAndKey($cateid, $genreid, $key)
    {
        $sql = "select count(*) from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $sql = $sql . "bookname like '%$key%'";
        }
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByIdAndKeyAndPage($cateid, $genreid, $key, $page, $numberbook)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "select * from book";
        if(isset($cateid)){
            $sql = $sql . ", category, genre where book.genreid = genre.genreid and genre.cateid = category.cateid AND category.cateid = '$cateid'";
        }
        else {
            $sql = $sql . " where ";
        }
        if(isset($genreid)){
            $sql = $sql . "genreid = '$genreid'";
        }
        if(isset($key)){
            $sql = $sql . "bookname like '%$key%'";
        }
        $sql = $sql . " limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookByPrice($pricestart, $priceend)
    {
        $sql = "SELECT count(*) FROM `book` WHERE saleprice >= '$pricestart' AND saleprice <= '$priceend'";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookByPriceAndPage($page, $numberbook, $pricestart, $priceend)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "SELECT * FROM `book` WHERE saleprice >= '$pricestart' AND saleprice <= '$priceend' limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getSellingBooksLimit3()
    {
        $sql = "SELECT * FROM book ORDER BY quantitysale DESC LIMIT 3";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getSellingBooksLimit6()
    {
        $sql = "SELECT * FROM book ORDER BY quantitysale DESC LIMIT 6";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getTotalQuantity()
    {
        $sql = "SELECT SUM(quantity) AS totalquantity FROM book";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['totalquantity'];
    }

    public function getCountSellingBooks()
    {
        $sql = "SELECT count(*) FROM book WHERE quantitysale >= 1 ORDER BY quantitysale DESC";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getSellingBooksByPage($page, $numberbook)
    {
        $numberbookcancel = $numberbook * ($page - 1);
        $sql = "SELECT * FROM book WHERE quantitysale >= 1 ORDER BY quantitysale DESC limit $numberbook offset $numberbookcancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookByGenreid($genreid, $bookid)
    {
        $sql = "select * from book where genreid = '$genreid' and bookid != '$bookid'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookOrderTop()
    {
        $sql = "SELECT * FROM `book` ORDER BY `book`.`quantitysale` DESC LIMIT 5";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getBookReport($datestart, $dateend, $currentPage, $numberOrderPage, $cateid, $sort, $keyword)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT `book`.`bookid`, `book`.`genreid`, `book`.`bookname`, SUM(`orderdetail`.`quantity`) AS quantitysale
                FROM `category` RIGHT JOIN `genre` ON `category`.`cateid` = `genre`.`cateid`
                RIGHT JOIN `book` ON `genre`.`genreid` = `book`.`genreid`
                LEFT JOIN `orderdetail` ON `book`.`bookid` = `orderdetail`.`bookid`
                INNER JOIN `order` ON `orderdetail`.`orderid` = `order`.`orderid`
                WHERE `order`.`requestcancel` = 0 ";
        if($datestart != null){
            $sql = $sql . "AND `order`.`orderdate` >= '$datestart' ";
        }
        if($dateend != null){
            $sql = $sql . "AND `order`.`orderdate` <= '$dateend' ";
        }
        if($cateid != null){
            $sql = $sql . "AND `category`.`cateid` = '$cateid' ";
        }
        if($keyword != null){
            $sql = $sql . "AND `book`.`bookname` LIKE '%$keyword%' ";
        }
        $sql = $sql . " GROUP BY `book`.`bookid` 
                        ORDER BY quantitysale ";
        
        if($sort == 'down'){
            $sql = $sql . "DESC ";
        }
        else {
            $sql = $sql . "ASC ";
        }
        $sql = $sql . "limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Book($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookReport($datestart, $dateend, $cateid, $keyword)
    {
        $sql = "SELECT count(*) FROM (SELECT `book`.`bookid`, `book`.`genreid`, `book`.`bookname`, SUM(`orderdetail`.`quantity`) AS quantitysale
                FROM `category` RIGHT JOIN `genre` ON `category`.`cateid` = `genre`.`cateid`
                RIGHT JOIN `book` ON `genre`.`genreid` = `book`.`genreid`
                LEFT JOIN `orderdetail` ON `book`.`bookid` = `orderdetail`.`bookid`
                INNER JOIN `order` ON `orderdetail`.`orderid` = `order`.`orderid`
                WHERE `order`.`requestcancel` = 0 ";
        if($datestart != null){
            $sql = $sql . "AND `order`.`orderdate` >= '$datestart' ";
        }
        if($dateend != null){
            $sql = $sql . "AND `order`.`orderdate` <= '$dateend' ";
        }
        if($cateid != null){
            $sql = $sql . "AND `category`.`cateid` = '$cateid' ";
        }
        if($keyword != null){
            $sql = $sql . "AND `book`.`bookname` LIKE '%$keyword%' ";
        }
        $sql = $sql . " GROUP BY `book`.`bookid` 
                        ORDER BY quantitysale DESC) as A";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['count(*)'];
    }

    public function getBookReportView($bookid, $currentPage, $numberOrderPage)
    {
        $numbercancel = $numberOrderPage * $currentPage;
        $sql = "SELECT `order`.`orderdate`, `user`.`username`, `orderdetail`.`quantity`
                FROM `orderdetail` INNER JOIN `order` ON `orderdetail`.`orderid` = `order`.`orderid`
                INNER JOIN `user` ON `order`.`userid` = `user`.`userid`
                WHERE `order`.`requestcancel` = 0
                AND `orderdetail`.`bookid` = '$bookid'
                limit $numberOrderPage offset $numbercancel";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new ReportProduct($row);
            $arr[] = $each;
        }
        return $arr; 
    }

    public function getCountBookReportView($bookid)
    {
        $sql = "SELECT COUNT(*) FROM
                (SELECT `order`.`orderdate`, `user`.`username`, `orderdetail`.`quantity`
                FROM `orderdetail` INNER JOIN `order` ON `orderdetail`.`orderid` = `order`.`orderid`
                INNER JOIN `user` ON `order`.`userid` = `user`.`userid`
                WHERE `order`.`requestcancel` = 0
                AND `orderdetail`.`bookid` = '$bookid') AS A";
        $result = (new Connect())->select($sql);
        $each = mysqli_fetch_array($result);
        return $each['COUNT(*)'];
    }

    public function updateQuantity($bookid, $quantity)
    {
        $sql = "update book set quantity = '$quantity' where bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

    public function updateQuantitySale($bookid, $quantitysale)
    {
        $sql = "update book set quantitysale = '$quantitysale' where bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

    public function addBook($params, $target_file)
    {
        $conn = (new Connect())->cnt();
        $genreid = $params['genreid'];
        $bookname = mysqli_real_escape_string($conn, $params['bookname']);
        $quantity = $params['quantity'];
        $quantitysale = 0;
        $costprice = $params['costprice'];
        $saleprice = $params['saleprice'];
        $distributor = mysqli_real_escape_string($conn, $params['distributor']);
        $publisher = mysqli_real_escape_string($conn, $params['publisher']);
        $author = mysqli_real_escape_string($conn, $params['author']);
        $translator = mysqli_real_escape_string($conn, $params['translator']);
        $year = mysqli_real_escape_string($conn, $params['year']);
        $size = mysqli_real_escape_string($conn, $params['size']);
        $pages = $params['pages'];
        $weight = $params['weight'];
        $description = mysqli_real_escape_string($conn, $params['description']);
        if($pages != null && $weight != null) {
            $sql = "INSERT INTO `book`
                (`genreid`, `bookname`, 
                `quantity`, `quantitysale`, `costprice`, `saleprice`, 
                `distributor`, `publisher`, `author`, `translator`, `year`, `size`, 
                `pages`, `weight`, 
                `description`, `image`) 
                VALUES 
                ('$genreid','$bookname',
                '$quantity','$quantitysale','$costprice','$saleprice',
                '$distributor','$publisher','$author','$translator','$year','$size',
                '$pages','$weight',
                '$description','$target_file')";
        }
        else if($pages == null && $weight == null) {
            $sql = "INSERT INTO `book`
                (`genreid`, `bookname`, 
                `quantity`, `quantitysale`, `costprice`, `saleprice`, 
                `distributor`, `publisher`, `author`, `translator`, `year`, `size`, 
                `description`, `image`) 
                VALUES 
                ('$genreid','$bookname',
                '$quantity','$quantitysale','$costprice','$saleprice',
                '$distributor','$publisher','$author','$translator','$year','$size',
                '$description','$target_file')";
        }
        else if($pages == null && $weight != null) {
            $sql = "INSERT INTO `book`
                (`genreid`, `bookname`, 
                `quantity`, `quantitysale`, `costprice`, `saleprice`, 
                `distributor`, `publisher`, `author`, `translator`, `year`, `size`, 
                `weight`, 
                `description`, `image`) 
                VALUES 
                ('$genreid','$bookname',
                '$quantity','$quantitysale','$costprice','$saleprice',
                '$distributor','$publisher','$author','$translator','$year','$size',
                '$weight',
                '$description','$target_file')";
        }
        else {
            $sql = "INSERT INTO `book`
                (`genreid`, `bookname`, 
                `quantity`, `quantitysale`, `costprice`, `saleprice`, 
                `distributor`, `publisher`, `author`, `translator`, `year`, `size`, 
                `pages`, 
                `description`, `image`) 
                VALUES 
                ('$genreid','$bookname',
                '$quantity','$quantitysale','$costprice','$saleprice',
                '$distributor','$publisher','$author','$translator','$year','$size',
                '$pages',
                '$description','$target_file')";
        }
        return (new Connect())->execute($sql);
    }

    public function editBook($params, $target_file)
    {
        $conn = (new Connect())->cnt();
        $bookid = $params['bookid'];
        $genreid = $params['genreid'];
        $bookname = mysqli_real_escape_string($conn, $params['bookname']);
        $quantity = $params['quantity'];
        $quantitysale = $params['quantitysale'];
        $costprice = $params['costprice'];
        $saleprice = $params['saleprice'];
        $distributor = mysqli_real_escape_string($conn, $params['distributor']);
        $publisher = mysqli_real_escape_string($conn, $params['publisher']);
        $author = mysqli_real_escape_string($conn, $params['author']);
        $translator = mysqli_real_escape_string($conn, $params['translator']);
        $year = mysqli_real_escape_string($conn, $params['year']);
        $size = mysqli_real_escape_string($conn, $params['size']);
        $pages = $params['pages'];
        $weight = $params['weight'];
        $description = mysqli_real_escape_string($conn, $params['description']);
        if($pages != null && $weight != null) {
            $sql = "UPDATE `book` SET 
            `genreid`='$genreid',`bookname`='$bookname',
            `quantity`='$quantity',`quantitysale`='$quantitysale',`costprice`='$costprice',`saleprice`='$saleprice',
            `distributor`='$distributor',`publisher`='$publisher',`author`='$author',
            `translator`='$translator',`year`='$year',`size`='$size',
            `pages`='$pages',`weight`='$weight',
            `description`='$description',`image`='$target_file' WHERE `bookid`='$bookid'";
        }
        else if($pages == null && $weight == null) {
            $sql = "UPDATE `book` SET 
            `genreid`='$genreid',`bookname`='$bookname',
            `quantity`='$quantity',`quantitysale`='$quantitysale',`costprice`='$costprice',`saleprice`='$saleprice',
            `distributor`='$distributor',`publisher`='$publisher',`author`='$author',
            `translator`='$translator',`year`='$year',`size`='$size',
            `description`='$description',`image`='$target_file' WHERE `bookid`='$bookid'";
        }
        else if($pages == null && $weight != null) {
            $sql = "UPDATE `book` SET 
            `genreid`='$genreid',`bookname`='$bookname',
            `quantity`='$quantity',`quantitysale`='$quantitysale',`costprice`='$costprice',`saleprice`='$saleprice',
            `distributor`='$distributor',`publisher`='$publisher',`author`='$author',
            `translator`='$translator',`year`='$year',`size`='$size',
            `weight`='$weight',
            `description`='$description',`image`='$target_file' WHERE `bookid`='$bookid'";
        }
        else {
            $sql = "UPDATE `book` SET 
            `genreid`='$genreid',`bookname`='$bookname',
            `quantity`='$quantity',`quantitysale`='$quantitysale',`costprice`='$costprice',`saleprice`='$saleprice',
            `distributor`='$distributor',`publisher`='$publisher',`author`='$author',
            `translator`='$translator',`year`='$year',`size`='$size',
            `pages`='$pages',
            `description`='$description',`image`='$target_file' WHERE `bookid`='$bookid'";
        }
        return (new Connect())->execute($sql);
    }

    public function deleteBook($bookid)
    {
        $sql = "DELETE FROM `book` WHERE bookid = '$bookid'";
        return (new Connect())->execute($sql);
    }

}