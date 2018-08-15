<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:25
 */


namespace AppBundle\Controller;



use AppBundle\Entity\Booking;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PaymentController extends Controller
{

    /**
     * @Route("/stripe/{id}", name="stripe")

     */
    public function prepareAction(Booking $booking)
    {
        $booking->getTotalPrice();
        return $this->render('ticketing/stripe.html.twig', [
            'booking' => $booking, 'id'=>$booking->getId()
        ]);
    }



    /**
     * @Route("/paiement/{id}", name="payment", methods="POST")
     */
    public function checkoutAction(Booking $booking)
    {
        \Stripe\Stripe::setApiKey("sk_test_yazSA0Tml2VVTtpQGmemCx9x");

        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];
        //$booking->getTotalPrice();

        // Create a charge: this will charge the user's card
        try {
            \Stripe\Charge::create(array(
                "amount" => $booking->getTotalPrice()*100, // Amount in cents
                "currency" => "eur",
                "source" => $token,
                "description" => "Paiement Stripe - OpenClassrooms Exemple"
            ));
            $this->addFlash("success","Votre paiement a été accepté, vous allez recevoir un mail de confirmation !");
            $mailer = $this->get('mailer');


            $message = (new \Swift_Message('Votre commande sur la billeterie du Louvre est validée'))
                ->setFrom('scarruezco@gmail.com')
                ->setTo('scarruezco@gmail.com')
                ->setBody(

                    $this->renderView('ticketing/confirmation_order_mail.html.twig', [
                        "booking" => $booking, 'id' => $booking->getId()
                    ]),
                    'text/html')
                /*
                 * If you also want to include a plaintext version of the message
                ->addPart(
                    $this->renderView(
                        'Emails/registration.txt.twig',
                        array('name' => $name)
                    ),
                    'text/plain'
                )
                */
            ;

            $mailer->send($message);
            return $this->redirectToRoute("message",[
                "id"=>$booking->getId()
            ]);
        } catch(\Stripe\Error\Card $e) {

            $this->addFlash("error","Carte refusée");
            return $this->redirectToRoute("message",[
                "id"=>$booking->getId()
            ]);
            // The card has been declined
        }

    }

    /**
     * @Route("/message/{id}", name="message")
     */
    public function messageAction(Booking $booking){

        return $this->render("ticketing/message.html.twig", [
            "id"=>$booking->getId()
        ]);


    }


}

