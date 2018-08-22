<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:24
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Booking;


use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


class OrderdetailsController extends Controller
{




    /**
     * @Route("/orderdetails/{id}", name="orderdetails")
     */
    public function orderdetailsAction(Booking $booking)
    {

        $booking->getInformations();
        if ($booking->isPaid()== true) {
            throw new Exception('Vous ne pouvez pas accéder à cette page');
        }

        return $this->render('ticketing/orderdetails.html.twig', [
            'booking' => $booking, 'id' => $booking->getId()
        ]);
    }



}

