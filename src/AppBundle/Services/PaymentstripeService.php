<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 11:18
 */

namespace AppBundle\Services;




use AppBundle\Entity\Booking;
use Symfony\Component\Routing\Annotation\Route;


class PaymentstripeService
{
    public function paymentService($booking)
    {
        \Stripe\Stripe::setApiKey("sk_test_yazSA0Tml2VVTtpQGmemCx9x");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create a charge: this will charge the user's card
        try {
            \Stripe\Charge::create(array(
                "amount" => $booking->getTotalPrice() * 100, // Amount in cents
                "currency" => "eur",
                "source" => $token,
                "description" => "Paiement Stripe - OpenClassrooms Exemple"
            ));

        } catch (\Stripe\Error\Card $e) {

            // The card has been declined

        }
        return $this;

    }

}
