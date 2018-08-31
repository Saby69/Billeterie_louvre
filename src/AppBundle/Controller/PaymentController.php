<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:25
 */


namespace AppBundle\Controller;



use AppBundle\Entity\Booking;
use AppBundle\Services\MailService;
use AppBundle\Services\PaymentstripeService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
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
    public function checkoutAction(Booking $booking, PaymentstripeService $paymentstripe, MailService $mailService)
    {

            $paymentstripe->paymentService($booking);

            $em = $this->getDoctrine()->getManager();
            $booking->setPaid(true);
            $em->flush();

            $this->addFlash("success","Votre paiement a été accepté, vous allez recevoir un mail de confirmation !");
            $mailService->mailSend($booking);



                return $this->redirectToRoute("message", [
                    "id" => $booking->getId()
                ]);
            }





    /**
     * @Route("/message/{id}", name="message")
     */
    public function messageAction(Booking $booking){

    if ($booking->isPaid()== false) {
        throw new AccessDeniedHttpException('Vous ne pouvez pas accéder à cette page');
    }
    else {
        return $this->render("ticketing/message.html.twig", [
            "id" => $booking->getId()
        ]);
    }


    }


}

