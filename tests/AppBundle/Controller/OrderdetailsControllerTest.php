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
    public function testOrderSelectorH1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/orderdetails');
        //$client->followRedirect();


        //Assertion balise h1
        $this->assertEquals(1, $crawler->filter('h1')->count());

        //Assertion Statut

        $this->assertEquals(200, $client->getResponse()->getStatusCode());





    }

}