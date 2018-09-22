<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:22
 */


namespace AppBundle\Controller;

use AppBundle\Form\Handlers\InfosHandler;
use AppBundle\Form\InformationType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;


class InfosController extends Controller
{
    /**
     * @Route("/infos", name="infos")
     */
    public function infosAction(Request $request, InfosHandler $infosHandler)
    {
        $booking = $request->getSession()->get('booking');
        if (!empty($booking)) {
            $informations = $infosHandler->NumberFormInformation($booking);

            //Création du formulaire
            $form = $this->createForm(CollectionType::class, $informations, ['entry_type'=>InformationType::class]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                    //appel au service InfosHandler qui gère le calcul des tickets + la génération d'un numéro de commande
                    $infosHandler->infos($booking, $informations);

                $this->get('session')->clear();

                $total = $booking->getTotalPrice();
                if ($total>0) {
                    return $this->redirectToRoute('orderdetails', [
                        'id' => $booking->getId()
                    ]);
                }
                else{
                    return $this->redirectToRoute('orderdetailsfree', [
                        'id' => $booking->getId()
                    ]);
                }
            }
        }
        return $this->render('ticketing/form_information.html.twig', [
            'booking' => $booking, 'ticketForm' => $form->createView()
        ]);
        }
}

