<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 23/08/2018
 * Time: 14:50
 */

namespace Tests\AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class InfosControllerTest extends WebTestCase
{
    public function testSelectorH1()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/infos');
        $client->followRedirect();
        dump($crawler);




        //Assertion balise h1
        $this->assertEquals(0, $crawler->filter('h1')->count());

        //Assertion Statut
        $this->assertEquals(200, $client->getResponse()->getStatusCode());


    }

}