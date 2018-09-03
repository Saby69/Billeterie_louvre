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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorServiceTest extends WebTestCase
{

    private $em;

    protected function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->em = $kernel
            ->getContainer()
            ->get('doctrine.orm.entity_manager');
    }

    protected function tearDown()
    {
        $this->em = null;
    }


    public function testCalculDayNormalTicketLess4WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('2016-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(0, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketBetween4And12WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('2009-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(8, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketWithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('1972-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(16, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketUnder60WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('1945-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(12, $result);

        self::tearDown();
    }
    public function testCalculDayNormalTicketLess4WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('2016-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(0, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketBetween4And12WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('2009-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(8, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketWithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('1972-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(10, $result);

        self::tearDown();
    }

    public function testCalculDayNormalTicketUnder60WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('d');
        $information->setBirthDate(new \DateTime('1945-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(10, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketLess4WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('2016-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(0, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketBetween4And12WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('2009-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(4, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketWithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('1972-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(8, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketUnder60WithoutReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('1945-05-31'));
        $information->setReducedPrice(false);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(6, $result);

        self::tearDown();
    }
    public function testCalculHalfDayNormalTicketLess4WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('2016-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(0, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketBetween4And12WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('2009-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(4, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketWithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('1972-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(5, $result);

        self::tearDown();
    }

    public function testCalculHalfDayNormalTicketUnder60WithReduc()
    {
        self::setUp();

        $booking = new Booking();
        $information = new Information();
        $booking->setDate(new \DateTime('2018-03-10'));
        $booking->setType('h');
        $information->setBirthDate(new \DateTime('1945-05-31'));
        $information->setReducedPrice(true);
        $booking->setInformations($information);

        $calculator = new CalculatorService($this->em);
        $result = $calculator->calculTicket($information, $booking);

        $this->assertEquals(5, $result);

        self::tearDown();
    }




}