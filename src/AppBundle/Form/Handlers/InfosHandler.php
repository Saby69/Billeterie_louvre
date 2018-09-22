<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 11/09/2018
 * Time: 11:30
 */

namespace AppBundle\Form\Handlers;


use AppBundle\Entity\Booking;
use AppBundle\Entity\Information;
use AppBundle\Services\CalculatorService;
use AppBundle\Services\OrderNumberService;
use Doctrine\Common\Persistence\ObjectManager;

class InfosHandler
{
    protected $objectManager;
    protected $calculatorService;
    protected $orderNumberService;

    public function __construct(ObjectManager $objectManager, CalculatorService $calculatorService, OrderNumberService $orderNumberService)
    {
        $this->objectManager = $objectManager;
        $this->calculatorService = $calculatorService;
        $this->orderNumberService = $orderNumberService;
    }

    public function NumberFormInformation(Booking $booking)
    {
            $amount = $booking->getAmount();
            for ($i = 1; $i <= $amount; $i++)
            {
                $informations[] = new Information();
            }
            return (array) $informations;
    }

    public function infos(Booking $booking, $informations)
    {
        foreach ($informations as $information)
        {

            //Calcul du montant de chaque ticket
            $price = $this->calculatorService->calculTicket($information, $booking);
            $information->setPriceTicket($price);

            //Calcul du montant total de la commande
            $booking->setTotalPrice($price);

            $booking->addInformation($information);

            //Génération d'un numéro de commande alphanumérique
            $string = $this->orderNumberService->ramdomNumber(10);

            $booking->setNumberOrder($string);
            $this->objectManager->persist($booking);
            $this->objectManager->flush();
        }
    }

}