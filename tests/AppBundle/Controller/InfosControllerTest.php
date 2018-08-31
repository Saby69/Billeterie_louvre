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

    public function testUrlIfFormEmpty()
    {
        $client = static::createClient();

        $client->request('GET', '/infos');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());

    }

}