<?php
/**
 * Created by PhpStorm.
 * User: Raffi Miskdjian
 * Date: 03/09/2018
 * Time: 08:42
 */

namespace Tests\AppBundle\Entity;


use AppBundle\Entity\Information;
use PHPUnit\Framework\TestCase;

class InformationTest extends TestCase
{
    public function testSetName()
    {
        $formulaire = new Information();
        $name = 'Miskdjian';
        $formulaire->setName($name);
        $this->assertEquals('Miskdjian', $formulaire->getName());
    }

    public function testSetFirstName()
    {
        $formulaire = new Information();
        $firstname = 'Raffi';
        $formulaire->setFirstName($firstname);
        $this->assertEquals('Raffi', $formulaire->getFirstName());
    }

    public function testSetCountry()
    {
        $formulaire = new Information();
        $country = 'Armenia';
        $formulaire->setCountry($country);
        $this->assertEquals('Armenia', $formulaire->getCountry());
    }

    public function testBirthDate()
    {
        $formulaire = new Information();
        $birthdate = '1954-04-26';
        $formulaire->setBirthDate($birthdate);
        $this->assertEquals('1954-04-26', $formulaire->getBirthDate());
    }

    public function testReducedPrice()
    {
        $formulaire = new Information();
        $reducedprice = 'false';
        $formulaire->setReducedPrice($reducedprice);
        $this->assertEquals('false', $formulaire->getReducedPrice());
    }

    public function testPriceTicket()
    {
        $formulaire = new Information();
        $priceticket = '16';
        $formulaire->setPriceTicket($priceticket);
        $this->assertEquals('16', $formulaire->getPriceTicket());
    }

}