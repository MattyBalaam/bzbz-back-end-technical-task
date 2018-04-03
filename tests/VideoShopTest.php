<?php

namespace VideoShop\Tests;

use PHPUnit\Framework\TestCase;
use VideoShop\Customer;
use VideoShop\Film;
use VideoShop\Rental;

class VideoShopTest extends TestCase
{
    private $customer;
    private $regular;
    private $newRelease;
    private $childrens;
    private $testStatement = 
        "Rental Record for Customer Name\n" .
        "\tRegular\t2\n" .
        "\tChildrens\t1.5\n" .
        "\tNew_Release\t9\n";

    private function assertAmountAndFrequentRenterPoints($amount, $points)
    {
        $this->assertEquals($amount, $this->customer->getTotalAmount());
        $this->assertEquals($points, $this->customer->getFrequentRenterPoints());
    }

    protected function setUp()
    {
        $this->customer = new Customer('Customer Name');
        $this->regular = new Film('Regular', Film::REGULAR);
        $this->childrens = new Film('Childrens', Film::CHILDRENS);
        $this->newRelease = new Film('New_Release', Film::NEW_RELEASE);
    }

    public function testStatement()
    {
        $this->customer->addRental(new Rental($this->regular, 1));
        $this->customer->addRental(new Rental($this->childrens, 2));
        $this->customer->addRental(new Rental($this->newRelease, 3));

        $this->assertEquals(
            $this->testStatement,
            $this->customer->getStatement()
        );
    }

    public function testFrequentRenterPoints(){
        $this->customer->addRental(new Rental($this->newRelease, 3));
        $this->customer->addRental(new Rental($this->regular, 3));
        $this->customer->calculateAllRentals();
        $this->assertEquals(3, $this->customer->getFrequentRenterPoints());
    }

    public function testRegular()
    {
        $this->customer->addRental(new Rental($this->regular, 7));
        $this->customer->calculateAllRentals();

        $this->assertAmountAndFrequentRenterPoints(9.5, 1);
    }

    public function testNewRelease()
    {
        $this->customer->addRental(new Rental($this->newRelease, 3));
        $this->customer->calculateAllRentals();

        $this->assertAmountAndFrequentRenterPoints(9, 2);
    }

    public function testChildrens()
    {
        $this->customer->addRental(new Rental($this->childrens, 3));
        $this->customer->calculateAllRentals();

        $this->assertAmountAndFrequentRenterPoints(1.5, 1);
    }

    public function testMultiple()
    {
        $this->customer->addRental(new Rental($this->regular, 3));
        $this->customer->addRental(new Rental($this->childrens, 3));
        $this->customer->addRental(new Rental($this->newRelease, 3));
        $this->customer->calculateAllRentals();

        $this->assertAmountAndFrequentRenterPoints(14, 4);
    }


}
