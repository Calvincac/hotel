<?php

class Hotel
{
    private $name;
    private $rate;
    private $prices;
    private $customer;
    private $day;

    public function __construct($name, $rate, $prices, Customer $customer,Day $day)
    {
        $this->name = $name;
        $this->rate = $rate;
        $this->prices = $prices;
        $this->customer = $customer;
        $this->day = $day;
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function getPrice()
    {
        return $this->prices;
    }

    public function getName()
    {
        return $this->name;
    }      
}
