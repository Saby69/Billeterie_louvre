<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 26/07/2018
 * Time: 09:22
 */


namespace AppBundle\Controller;

use AppBundle\Entity\Information;
use AppBundle\Entity\Rate;
use AppBundle\Form\InformationType;
use AppBundle\Services\CalculatorService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\HttpFoundation\Request;


class InfosController extends Controller
{




    /**
     * @Route("/infos", name="infos")
     */
    public function infosAction(Request $request, CalculatorService $calcul)
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


                    $price = $calcul->calculTicket($information);

                    dump($price);

                    $information->setPriceTicket($price);
                    $booking->addInformation($information);



                }
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

