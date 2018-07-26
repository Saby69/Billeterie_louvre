<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:25
 */


namespace AppBundle\Controller;



use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PaymentController extends Controller
{


    //Integration stripe
    /**
     * @Route("/stripe", name="stripe")
     */
    public function prepareAction()
    {
        return $this->render('ticketing/stripe.html.twig');
    }

    /**
     * @Route(
     *     "/checkout",
     *     name="order_checkout",
     *     methods="POST"
     * )
     */
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

