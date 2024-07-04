<?php

require_once 'dao/Connect.php';
require_once 'model/Genre.php';

class GenreDAO {
    public function getGenreById($id)
    {
        if(empty($id)){
            return null;
        }
        $sql = "select * from genre where genreid = '$id'";
        $result = (new Connect())->select($sql);
        $number_rows = mysqli_num_rows($result);
        if($number_rows == 0)
        {
            return null;
        }
        $each = mysqli_fetch_array($result);
        return new Genre($each);
    }

    public function getGenreByCateid($id)
    {
        $sql = "select * from genre where cateid = '$id'";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Genre($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getAllGenre()
    {
        $sql = "select * from genre";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Genre($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function getCountBookById($id)
    {
        $sql = "SELECT COUNT(*) FROM `book`, genre WHERE book.genreid = genre.genreid AND genre.genreid = '$id'";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }

    public function getCountGenre()
    {
        $sql = "SELECT COUNT(*) FROM `genre`";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return $row['COUNT(*)'];
    }

    public function getCountGenreActive()
    {
        $sql = "SELECT COUNT(genreid) 
                FROM
                (SELECT 
                    `genre`.`genreid` AS genreid, 
                    SUM(`book`.`bookid`) AS totalbook
                FROM 
                    `genre`
                LEFT JOIN 
                    `book` ON `genre`.`genreid` = `book`.`genreid`
                GROUP BY 
                    `genre`.`genreid`
                HAVING totalbook > 0) AS A";
        $result = (new Connect())->select($sql);
        $row = mysqli_fetch_array($result);
        return $row['COUNT(genreid)'];
    }
    
    public function getGenreOrderTop()
    {
        $sql = "SELECT 
                    `genre`.*, 
                    SUM(`book`.`quantitysale`) AS totalbook
                FROM 
                    `genre`
                LEFT JOIN 
                    `book` ON `genre`.`genreid` = `book`.`genreid`
                GROUP BY 
                    `genre`.`genreid`
                ORDER BY 
                    totalbook DESC
                LIMIT 5";
        $result = (new Connect())->select($sql);
        $arr = [];
        foreach ($result as $row) {
            $each = new Genre($row);
            $arr[] = $each;
        }
        return $arr;
    }

    public function addGenre($cateid, $namegenre)
    {
        $sql = "INSERT INTO `genre`(`cateid`, `genrename`) VALUES ('$cateid','$namegenre')";
        $error = (new Connect())->execute($sql);
        return $error;
    }

    public function editGenre($id, $cateid, $namegenre)
    {
        $sql = "UPDATE `genre` SET `cateid`='$cateid',`genrename`='$namegenre' WHERE `genreid`='$id'";
        $error = (new Connect())->execute($sql);
        return $error;
    }

    public function deleteGenre($id)
    {
        $sql = "DELETE FROM `genre` WHERE `genreid` = '$id'";
        $error = (new Connect())->execute($sql);
        return $error;
    }
}