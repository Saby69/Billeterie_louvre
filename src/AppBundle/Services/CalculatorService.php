<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 28/06/2018
 * Time: 09:09
 */

namespace AppBundle\Services;


use AppBundle\Entity\Booking;
use AppBundle\Entity\Information;
use AppBundle\Entity\Rate;
use Doctrine\ORM\EntityManagerInterface;


class CalculatorService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function calculTicket(Information $information, Booking $booking)
    {

        date_default_timezone_set('Europe/Paris');
        $datetime2 = $information->getBirthDate()->diff(new \DateTime()); // calcul de l'age
        $age = $datetime2->y;
        $rate = $this->em->getRepository(Rate::class)->find(1);
        $reducedPrice = $information->getReducedPrice();
        $bookingType = $booking->getType();

        if ($reducedPrice === false AND $bookingType === "d") {
            if ($age < 4) {
                $ticketRate = $rate->getRatebaby();

            } elseif ($age >= 4 AND $age < 12) {
                $ticketRate = $rate->getRatechildren();

            } elseif ($age >= 12 AND $age < 60) {
                $ticketRate = $rate->getRatenormal();

            } elseif ($age >= 60) {
                $ticketRate = $rate->getRatesenior();
            }
        } elseif ($reducedPrice === false AND $bookingType === "h") {
            if ($age < 4) {
                $ticketRate = $rate->getRatebaby();

            } elseif ($age >= 4 AND $age < 12) {
                $ticketRate = $rate->getRatechildren() / 2;

            } elseif ($age >= 12 AND $age < 60) {
                $ticketRate = $rate->getRatenormal() / 2;

            } elseif ($age >= 60) {
                $ticketRate = $rate->getRatesenior() / 2;

            }
        } elseif ($reducedPrice === true AND $bookingType === "d") {
            if ($age < 4) {
                $ticketRate = $rate->getRatebaby();

            } elseif ($age >= 4 AND $age < 12) {
                $ticketRate = $rate->getRatechildren();

            } elseif ($age >= 12 AND $age < 60) {
                $ticketRate = $rate->getRatereduc();

            } elseif ($age >= 60) {
                $ticketRate = $rate->getRatereduc();

            }

        } elseif ($reducedPrice === true AND $bookingType === "h") {
            if ($age < 4) {
                $ticketRate = $rate->getRatebaby();

            } elseif ($age >= 4 AND $age < 12) {
                $ticketRate = $rate->getRatechildren() / 2;

            } elseif ($age >= 12 AND $age < 60) {
                $ticketRate = $rate->getRatereduc() / 2;

            } elseif ($age >= 60) {
                $ticketRate = $rate->getRatereduc() / 2;

            }

        }
        return $ticketRate;

    }
}