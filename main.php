<?php

require_once "HotelBuilder.php";

$input = "Regular: 16Mar2009(mon), 17Mar2009(tues), 18Mar2009(wed)";

$hotelBuilder = new HotelBuilder($input);
$hotelBuilder->buildHotels();

print_r($hotelBuilder->buildHotels()->calculateRate());