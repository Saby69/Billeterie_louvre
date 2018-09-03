<?php
/**
 * Created by PhpStorm.
 * User: Raffi Miskdjian
 * Date: 03/09/2018
 * Time: 08:24
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Booking;
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{

    public function testSetDate()
    {
        $formulaire = new Booking();
        $date = '2019-08-12';
        $formulaire->setDate($date);
        $this->assertEquals('2019-08-12', $formulaire->getDate());
    }

    public function testSetType()
    {
        $formulaire = new Booking();
        $type = 'd';
        $formulaire->setType($type);
        $this->assertEquals('d', $formulaire->getType());
    }

    public function testSetAmount()
    {
        $formulaire = new Booking();
        $amount = '12';
        $formulaire->setAmount($amount);
        $this->assertEquals('12', $formulaire->getAmount());
    }

    public function testSetMail()
    {
        $formulaire = new Booking();
        $mail = 'scarruezco@gmail.com';
        $formulaire->setMail($mail);
        $this->assertEquals('scarruezco@gmail.com', $formulaire->getMail());
    }

    public function testSetTotalPrice()
    {
        $formulaire = new Booking();
        $TotalPrice = '12';
        $formulaire->setTotalPrice($TotalPrice);
        $this->assertEquals('12', $formulaire->getTotalPrice());
    }

    public function testNumberOrder()
    {
        $formulaire = new Booking();
        $NumberOrder = 'BzR56XXxyç';
        $formulaire->setNumberOrder($NumberOrder);
        $this->assertEquals('BzR56XXxyç', $formulaire->getNumberOrder());
    }




}