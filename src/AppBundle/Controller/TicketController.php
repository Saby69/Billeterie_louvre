<?php

namespace AppBundle\Controller;

use AppBundle\Form\TicketFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketController extends Controller
{


    /**
     * @Route("/ticketing")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(TicketFormType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            dump($form->getData());die;
        }

        return $this->render('ticketing/index.html.twig', [
            'ticketForm' => $form->createView()
        ]);
    }
}