<?php

class Customer
{ 
    private $type;
   
    public function __construct($pattern)
    {
        $this->processTypeOfCustomer($pattern);
    }

    /*
    * Method responsible for processing input in order to get the type of customer.
    */
    public function processTypeOfCustomer($pattern)
    {
        $regex = "/^([\w]+)/";
        preg_match_all($regex, $pattern, $customerType);
        $this->type = $customerType[0];

        return $this; 
    }

    /*
    * Method responsible for verifying if the type of customer is Regular.
    */
    public function isRegular()
    {
        $type = strtolower($this->type[0]);
        if ($type == "regular"){
            return true;
        }
        return false;
    }
}