<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Entity\Information;
use AppBundle\Form\InformationType;
use AppBundle\Form\BookingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketController extends Controller
{


    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
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
        $information = new Information();
        /*$booking = new Booking();
        $information->setBooking($booking);*/
        $form = $this->createForm(InformationType::class, $information);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager()/*->getRepository('AppBundle:Information')->findAll()*/;
            $em->persist($data);
            $em->flush();
            return $this->redirectToRoute('orderdetails');

        }

        return $this->render('ticketing/form_information.html.twig', [
            'ticketForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/orderdetails", name="orderdetails")
     */
    public function orderdetailsAction()
    {
        return $this->render('ticketing/orderdetails.html.twig');
    }

    }

