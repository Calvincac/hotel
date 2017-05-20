<?php
require_once "Hotel.php";
require_once "Customer.php";
require_once "Day.php";
require_once "Reservation.php";

class HotelBuilder {

    private $hotels;
    private $prices;
    private $customerType;
    private $days;

    public function __construct($pattern)
    {
        $this->customerType = new Customer($pattern);
        $this->days = new Day($pattern);
        $this->buildHotels();
    }

    public function buildHotels()
    {
        $customer = $this->customerType; 
        $days = $this->days;
        
        $lakewoodPrices = [
            'weekend' => [90, 80],
            'weekday' => [110, 90] 
            ];

        $bridgewoodPrices = [
            'weekend' => [60, 50],
            'weekday' => [160, 110] 
            ];
        $ridgewoodPrices = [
            'weekend' => [150, 40],
            'weekday' => [220, 100] 
            ];
        
        $lakewood =  new Hotel("Lakewood", 3, $lakewoodPrices, $customer,$days);
        $bridgewood = new Hotel("Bridgewood", 4, $bridgewoodPrices, $customer, $days);
        $ridgewood = new Hotel("Ridgewood", 5, $ridgewoodPrices, $customer, $days);

        $this->hotels = [$lakewood, $bridgewood, $ridgewood];
        $reservation = new Reservation($this->hotels);

        return $reservation;        
    }   
}