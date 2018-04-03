<?php

namespace VideoShop;

class Rental
{

    private $_film;
    private $_daysRented;
    private $_price;
    private $_bonusPoints;

    public function __construct($film, $daysRented)
    {
        $this->_film = $film;
        $this->_daysRented = $daysRented;
        $this->_price = $this->calculateAmount();
        $this->_bonusPoints = $film->getPriceCode() == Film::NEW_RELEASE && $daysRented > 1 ? 2 : 1;
    }

    /**
     * @return int
     */
    public function getDaysRented()
    {
        return $this->_daysRented;
    }
    
    /**
     * @return Film 
     */
    public function getFilm()
    {
        return $this->_film;
    }

    /**
     * @return int
     */
    public function getBonusPoints() {
        return $this->_bonusPoints;
    }

    /**
     * @return int
     */
    public function getPrice() {
        return $this->_price;
    }

    /**
     * @return int
     */
    public function calculateAmount(){
        $daysRented = $this->getDaysRented();
        switch ($this->getFilm()->getPriceCode()) {
            case Film::REGULAR:
                $thisAmount = 2;
                if ($daysRented > 2) {
                    $thisAmount += ($daysRented - 2) * 1.5;
                }
                break;
            case Film::NEW_RELEASE:
                $thisAmount = $daysRented * 3;
                break;
            case Film::CHILDRENS:
                $thisAmount = 1.5;
                if ($daysRented > 3) {
                    $thisAmount += ($daysRented - 3) * 1.5;
                }
                break;
            }
        return $thisAmount;
    }

}
