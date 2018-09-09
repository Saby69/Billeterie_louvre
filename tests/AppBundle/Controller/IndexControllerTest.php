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

    public function testBookingForm()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $form = $crawler->selectButton('Suivant')->form();

        $client->submit($form, array(
            'app_bundle_ticket_form_type[date]' => '11/09/2019',
            'app_bundle_ticket_form_type[type]' => 'd',
            'app_bundle_ticket_form_type[amount]' => 1,
            'app_bundle_ticket_form_type[mail]' => 'test@toto.com'
        ));
        $crawler = $client->followRedirect();
        $this->assertSame(1, $crawler->filter('h2:contains("Vos informations")')->count());


    }

}
