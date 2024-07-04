<?php

require_once 'dao/OrderDAO.php';

class Notification {
    private $id;
    private $userid;
    private $date;
    private $note;
    private $order;

    public function __construct($row) {
        $this->id = $row['id'];
        $this->userid = $row['userid'];
        $this->date = $row['date'];
        $this->note = $row['note'];
        $this->order = (new OrderDAO())->getOrderById($row['orderid']) ?? null;
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userid;
    }

    // Getter for date
    public function getDate() {
        return $this->date;
    }
    
    // Setter for date
    public function setDate($date) {
        $this->date = $date;
    }

    // Getter for note
    public function getNote() {
        return $this->note;
    }

    // Setter for note
    public function setNote($note) {
        $this->note = $note;
    }

    // Getter for orderid
    public function getOrder() {
        return $this->order;
    }

    // Setter for orderid
    public function setOrder($order) {
        $this->order = $order;
    }
}