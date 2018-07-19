<?php

namespace AppBundle\Controller;

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


class TicketController extends Controller
{


    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);
        dump($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            $session->set('booking', $booking);
            return $this->redirectToRoute('infos');
        }

        return $this->render('ticketing/index.html.twig', [
            'ticketForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/infos", name="infos")
     */
    public function infosAction(Request $request)
    {

        $booking = $request->getSession()->get('booking');

        if(!empty($booking)) {
            $amount = $booking->getAmount();
            for($i=1; $i<= $amount; $i++) {
                $informations[] = new Information();
            }
            $form = $this->createForm(CollectionType::class, $informations, ['entry_type'=>InformationType::class]);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();
                foreach($informations as $information)
                {
                    $booking->addInformation($information);
                    $em->persist($information);
                }
                $em->persist($booking);
                $em->flush();
                return $this->redirectToRoute('orderdetails');
            }
            return $this->render('ticketing/form_information.html.twig', [
                'booking' => $booking, 'ticketForm' => $form->createView()
            ]);
        }
        return $this->redirectToRoute("index");

    }

    /**
     * @Route("/orderdetails", name="orderdetails")
     */
    public function orderdetailsAction(Calculator $calculator)
    {
        $em = $this->getDoctrine()->getManager();
        $date = new \DateTime('2018-07-25');
        $numberticket = $em->getRepository('AppBundle:Booking') -> findNumberTicketOneDate($date);
        dump($numberticket);

        return $this->render('ticketing/orderdetails.html.twig');
    }

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

