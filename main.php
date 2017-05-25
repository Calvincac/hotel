<?php

require_once "HotelBuilder.php";

$input = "Rewards: 26Mar2009(thur), 27Mar2009(fri), 28Mar2009(sat)";

$hotelBuilder = new HotelBuilder($input);

print_r($hotelBuilder->buildHotels()->calculateRate());