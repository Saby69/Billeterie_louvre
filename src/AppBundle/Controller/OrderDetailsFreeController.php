<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:24
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Booking;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Services\MailService;



class OrderDetailsFreeController extends Controller
{




    /**
     * @Route("/orderdetailsfree/{id}", name="orderdetailsfree")
     */
    public function orderdetailsAction(Booking $booking, MailService $mailService)
    {

        $booking->getInformations();
        if ($booking->isPaid()== true) {
            throw new AccessDeniedHttpException('Vous ne pouvez pas accéder à cette page');
        }
        else {

            $em = $this->getDoctrine()->getManager();
            $booking->setPaid(true);
            $em->flush();
            $mailService->mailSend($booking);
            return $this->render('ticketing/orderdetailsfree.html.twig', [
                'booking' => $booking, 'id' => $booking->getId()
            ]);
        }
    }



}

