<?php

require_once "HotelBuilder.php";

$input = "Regular: 20Mar2009(fri), 21Mar2009(sat), 22Mar2009(sun)";

$hotelBuilder = new HotelBuilder($input);
$hotelBuilder->buildHotels();

print_r($hotelBuilder->buildHotels()->calculateRate());


















