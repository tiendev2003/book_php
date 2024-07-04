<?php

class ReportProduct {
    private $orderdate;
    private $username;
    private $quantity;

    // Constructor
    public function __construct($row) {
        $this->orderdate = $row['orderdate'];
        $this->username = $row['username'];
        $this->quantity = $row['quantity'];
    }

    // Getter và Setter cho $dateorder
    public function getOrderDate() {
        return $this->orderdate;
    }

    // Getter và Setter cho $username
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    // Getter và Setter cho $quantity
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
}
