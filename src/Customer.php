<?php

namespace VideoShop;

use VideoShop\Film;
use VideoShop\Rental;

class Customer
{
    private $_name;
    private $_rentals;
    private $_totalAmount;
    private $_frequentRenterPoints;

    public function __construct($name)
    {
        $this->_name = $name;
        $this->_rentals = [];
    }

    /**
     * @param Rental $rental
     * @return void;
     */
    public function addRental($rental)
    {
        $this->_rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @return array
     */
    public function getRentals()
    {
        return $this->_rentals;
    }

    /**
     * @return void;
     */
    private function incrementTotalAmount($amount)
    {
        $this->_totalAmount += $amount;
    }

    /**
     * @return int
     */
    public function getTotalAmount()
    {
        return $this->_totalAmount;
    }

    /**
     * @return int
     */
    public function getFrequentRenterPoints() {
        return $this->_frequentRenterPoints;
    }

    /**
     * @param int $amount
     * @return void;
     */
    private function incrementFrequentRenterPoints($amount = 1)
    {
        $this->_frequentRenterPoints += $amount;
    }

    /**
     * @return void;
     */
    public function calculateAllRentals() {

        $this->_totalAmount = 0;
        $this->_frequentRenterPoints = 0;

        foreach ($this->getRentals() as $rental) {
            $this->incrementTotalAmount($rental->getPrice()) ;
            $this->incrementFrequentRenterPoints($rental->getBonusPoints());
        }
    }

    /**
     * @return string;
     */
    public function getStatement()
    {

        $this->calculateAllRentals();

        $result = "Rental Record for " . $this->getName() . "\n";
        foreach ($this->getRentals() as $rental) {
            //show figures for this rental
            // toDo - should this be in £0.00 format ?
            $result .= "\t" . $rental->getFilm()->getTitle() . "\t" . $rental->getPrice() . "\n";
        }

        // toDo - query if total and frequent points should be displayed - calls commented here for convenience.
        // $this->getFrequentRenterPoints();
        // $this->getTotalAmount();

        return $result;
    }

}
