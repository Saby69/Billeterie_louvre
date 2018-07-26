<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:19
 */



namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use AppBundle\Form\BookingType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends Controller
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

}