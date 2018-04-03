<?php

class Rental
{
    public function __construct($film, $daysRented)
    {
        $this->_film = $film;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented()
    {
        return $this->_daysRented;
    }

    /**
     * @return Film 
     * */
    public function getFilm()
    {
        return $this->_film;
    }

    private $_film;
    private $_daysRented;
}
