<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 23/08/2018
 * Time: 14:51
 */

namespace Tests\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class PaymentControllerTest extends WebTestCase
{
    public function testIsPaid()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/message/1');

        //Assertion Statut
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //Assertion balise h1
        $this->assertEquals(1, $crawler->filter('h1')->count());
    }

    public function testIsNotPaid()
    {
        $client = static::createClient();
        $client->request('GET', '/message/9');
        $this->assertEquals(403, $client->getResponse()->getStatusCode());

    }

}