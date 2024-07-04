<?php

require_once 'dao/OrderDAO.php';

class ReportRevenue {
    private $year;
    private $quanter;
    private $month;
    private $date;
    private $total_cost;
    private $total_revenue;
    private $total_profit;

    // Constructor
    public function __construct($row) {
        $this->year = $row['delivery_year'];
        $this->quanter = $row['delivery_quarter'] ?? null;
        $this->month = $row['delivery_month'] ?? null;
        $this->date = $row['delivery_date'] ?? null;
        $this->total_cost = $row['total_cost'];
        $this->total_revenue = $row['total_revenue'];
        $this->total_profit = $row['total_profit'];
        // $this->order = (new OrderDAO())->getOrderByReportRevenue($row['delivery_year'], $row['delivery_quarter'] ?? null, $row['delivery_month'] ?? null, $row['delivery_date'] ?? null);
        // (new OrderDAO())->getOrderByReportRevenue($row['delivery_year'], $row['delivery_quarter'] ?? null, $row['delivery_month'] ?? null, $row['delivery_date'] ?? null)
    }

    // Getters
    public function getYear() {
        return $this->year;
    }

    public function getQuanter() {
        return $this->quanter;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getDate() {
        return $this->date;
    }

    public function getString(){
        $string = null;
        if($this->getDate() != null) {
            $string =  $this->getDate();
        }
        else if($this->getMonth() != null){
            $string =  $this->getMonth() . " - " . $this->getYear();
        }
        else if($this->getQuanter() != null){
            $string =  $this->getQuanter() . " - " . $this->getYear();
        }
        else {
            $string =  $this->getYear();
        }
        return $string;
    }

    public function getTotalCost() {
        return $this->total_cost;
    }

    public function getTotalRevenue() {
        return $this->total_revenue;
    }

    public function getTotalProfit() {
        return $this->total_profit;
    }

    public function getOrder() {
        return $this->order;
    }

    // Setters
    public function setYear($year) {
        $this->year = $year;
    }

    public function setQuanter($quanter) {
        $this->quanter = $quanter;
    }

    public function setMonth($month) {
        $this->month = $month;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setTotalCost($total_cost) {
        $this->total_cost = $total_cost;
    }

    public function setTotalRevenue($total_revenue) {
        $this->total_revenue = $total_revenue;
    }

    public function setTotalProfit($total_profit) {
        $this->total_profit = $total_profit;
    }
}


