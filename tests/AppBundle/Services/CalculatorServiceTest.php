<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 23/08/2018
 * Time: 10:50
 */

namespace Tests\AppBundle\Services;


use AppBundle\Entity\Booking;
use AppBundle\Entity\Information;
use AppBundle\Services\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorServiceTest extends KernelTestCase
{

    private $em;

    protected function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->em = $kernel
            ->getContainer()
            ->get('doctrine');
    }

    protected function tearDown()
    {
        $this->em = null;
    }

    public function CalculNormalticketLess4()
    {

        self::setUp();
        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime(28/02/2018));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime(31/05/2016));
        $information->setReducedPrice(1);

        $calculator = new CalculatorService($this->em);


        $this->assertEquals(0, $calculator->calculTicket($information, $booking));



        self::tearDown();

    }




}