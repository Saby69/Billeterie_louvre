<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:24
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Booking;

use AppBundle\Entity\Information;
use AppBundle\Services\CalculatorService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class OrderdetailsController extends Controller
{




    /**
     * @Route("/orderdetails/{id}", name="orderdetails")
     */
    public function orderdetailsAction(Booking $booking)
    {

        $booking->getInformations();


        return $this->render('ticketing/orderdetails.html.twig', [
            'booking' => $booking
        ]);
    }



}

