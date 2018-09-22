<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 23/08/2018
 * Time: 14:50
 */

namespace Tests\AppBundle\Controller;
use AppBundle\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class InfosControllerTest extends WebTestCase
{



    public function testUrlIfBookingValid()
    {
        $client = static::createClient();

        $booking = new Booking();
        $booking->setAmount(1);
        $booking->setDate(new \DateTime());
        $booking->setType('d');
        $booking->setMail('toto@toto.fr');

        $session = $client->getContainer()->get('session');
        $session->set('booking', $booking);


        $client->request('GET', '/infos');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }
}