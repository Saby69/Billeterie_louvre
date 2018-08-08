<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:25
 */


namespace AppBundle\Controller;



use AppBundle\Services\PaymentstripeService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PaymentController extends Controller
{

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
    public function checkout(PaymentstripeService $co)
    {
         $co->checkoutAction();

    }

}

