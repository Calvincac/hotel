<?php


class Reservation
{
    private $hotels;
    private $cheapestPrice = PHP_INT_MAX;
    private $cheapestHotel = null;
    private $weekendPrice = null;

    public function __construct($hotels)
    {
        $this->hotels = $hotels;
    }

    /*
    * Method responsible final rate
    */
    public function calculateRate()
    {
        foreach($this->hotels as $hotel) {
            $total = $this->processRate($hotel, ($hotel->getCustomer()->isRegular()) ? 0 : 1 );
            $this->getCheapestHotel = $this->getCheapestHotel($total, $hotel);
        }
        return $this->getCheapestHotel;         
    }

    /*
    * Method responsible for processing rate calculations based on weekdays and weekendays
    */
    public function processRate($hotel, $code)
    {
        if ($hotel->getDay()->hasWeekend()) {
            $sumOfweekends =  $hotel->getDay()->getSumOfWeekendDays();            
            $this->weekendPrice = $this->calculateWeekendRate($sumOfweekends, $hotel, $code);                      
        }
        $sumOfweekDays =  $hotel->getDay()->getSumOfWeekDays();
        $weekPrice = $this->calculateWeekRate($sumOfweekDays, $hotel, $code);
        $total = $weekPrice + $this->weekendPrice; 

        return $total;
    }

    /*
    * Method responsible for calculating weekend rate
    */
    public function calculateWeekendRate($sumOfweekends, $hotel, $code)
    {
        $weekendPrice =  $hotel->getPrice()['weekend'][$code];
        $weekendPrice = $weekendPrice * $sumOfweekends;

        return $weekendPrice;                
    }

    /*
    * Method responsible for calculating week rate
    */
    public function calculateWeekRate($sumOfweekDays, $hotel, $code)
    {
        $weekPrice =  $hotel->getPrice()['weekday'][$code];
        $weekPrice =  $weekPrice * $sumOfweekDays;
        
        return $weekPrice;
    }

    /*
    * Method responsible for returning the cheapest hotel name
    */
    public function getCheapestHotel($total, $hotel)
    {       
        if($total < $this->cheapestPrice ) {
            $this->cheapestPrice = $total;
            $this->cheapestHotel = $hotel->getName();
        }
        return $this->cheapestHotel;
    }
}