<?php

namespace VideoShop;

class Film
{

    private $_title;
    private $_priceCode;

    const REGULAR = 0;
    const NEW_RELEASE = 1;
    const CHILDRENS = 2;

    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    /**
     * @return int;
     */
    public function getPriceCode()
    {
        return $this->_priceCode;
    }

    /**
     * @param int;
     * @return void;
     */
    public function setPriceCode($value)
    {
        $this->_priceCode = $value;
    }

    /**
     * @return string;
     */
    public function getTitle()
    {
        return $this->_title;
    }

}
