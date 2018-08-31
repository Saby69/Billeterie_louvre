<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 23/08/2018
 * Time: 14:51
 */

namespace Tests\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class OrderdetailsControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function testH1BookingIsNotPaid()
    {
        $client = static::createClient();


        $crawler = $client->request('GET', '/orderdetails/9');


        $this->assertEquals(1, $crawler->filter('h1')->count());

    }

    public function testUrlBookingIsNotPaid()
    {
        $client = static::createClient();


        $client->request('GET', '/orderdetails/9');


        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }


    public function testUrlBookingIsPaid()
    {
        $client = static::createClient();

        $client->request('GET', '/orderdetails/1');

        $this->assertEquals(403, $client->getResponse()->getStatusCode());

    }

}
