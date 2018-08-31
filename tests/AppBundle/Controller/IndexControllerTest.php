<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 22/08/2018
 * Time: 18:30
 */

namespace Tests\AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class IndexControllerTest extends WebTestCase
{
    public function testSelectorH1Status()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        //Assertion Statut
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        //Assertion balise h1
        $this->assertEquals(1, $crawler->filter('h1')->count());
    }



}
