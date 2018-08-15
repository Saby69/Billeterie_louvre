<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:22
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Information;
use AppBundle\Form\InformationType;
use AppBundle\Services\CalculatorService;
use AppBundle\Services\OrderNumberService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;


class InfosController extends Controller
{




    /**
     * @Route("/infos", name="infos")
     */
    public function infosAction(Request $request, CalculatorService $calcul, OrderNumberService $number)
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
                    //Calcul du montant de chaque ticket
                    $price = $calcul->calculTicket($information, $booking);
                    $information->setPriceTicket($price);

                    //Calcul du montant total de la commande
                    $booking->setTotalPrice($price);

                    $booking->addInformation($information);

                }

                $string = $number->ramdomNumber(10);
                $booking->setNumberOrder($string);
                $em->persist($booking);
                $em->flush();
                $this->get('session')->clear();
                return $this->redirectToRoute('orderdetails', [
                    'id'=>$booking->getId()
                ]);
            }
            return $this->render('ticketing/form_information.html.twig', [
                'booking' => $booking, 'ticketForm' => $form->createView()
            ]);
        }
        return $this->redirectToRoute("index");

    }


}

