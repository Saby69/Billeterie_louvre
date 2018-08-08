<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 11:18
 */

namespace AppBundle\Services;

use AppBundle\Entity\Booking;
use AppBundle\Entity\Information;
use AppBundle\Form\InformationType;
use AppBundle\Form\BookingType;
use AppBundle\Services\Calculator;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;

class PaymentstripeService
{

    //Integration stripe




    public function checkoutAction()
    {
        \Stripe\Stripe::setApiKey("sk_test_yazSA0Tml2VVTtpQGmemCx9x");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create a charge: this will charge the user's card
        try {
            $charge = \Stripe\Charge::create(array(
                "amount" => 1000, // Amount in cents
                "currency" => "eur",
                "source" => $token,
                "description" => "Paiement Stripe - OpenClassrooms Projet4"
            ));
            $this->addFlash("success","Votre paiement  été accepté");
            return $this->redirectToRoute("stripe");
        } catch(\Stripe\Error\Card $e) {

            $this->addFlash("error","Il semblerait qu'il y ait un problème !(");
            return $this->redirectToRoute("stripe");
            // The card has been declined
        }
    }
    //fin integration stripe
}