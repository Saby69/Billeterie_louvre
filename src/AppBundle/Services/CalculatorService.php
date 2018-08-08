<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 28/06/2018
 * Time: 09:09
 */

namespace AppBundle\Services;


use AppBundle\Entity\Information;
use AppBundle\Entity\Rate;
use Doctrine\ORM\EntityManagerInterface;


class CalculatorService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }


    public function calculTicket(Information $information)
    {

        date_default_timezone_set('Europe/Paris');
        //$datetime1 = new \DateTime("now"); // date actuelle
        $datetime2 = $information->getBirthDate()->diff(new \DateTime()); // calcul de l'age
        $age = $datetime2->y;
        $rate = $this->em->getRepository(Rate::class)->find(1);
        $reducedPrice = $information->getReducedPrice();

        if ($reducedPrice === false) {
            if ($age < 4) {
                $ticketRate = $rate->getRatebaby();
                //return $ticketRate;

            } elseif ($age >= 4 AND $age < 12) {
                $ticketRate = $rate->getRatechildren();
                //return $ticketRate;
            } elseif ($age >= 12 AND $age < 60) {
                $ticketRate = $rate->getRatenormal();
                //return $ticketRate;
            } elseif ($age >= 60) {
                $ticketRate = $rate->getRatesenior();
                //return $ticketRate;
            }
            dump($ticketRate);
            return $ticketRate;
        }
        else{
            $ticketRate = $rate->getRatereduc();
            dump($ticketRate);
            return $ticketRate;
        }


   }


}