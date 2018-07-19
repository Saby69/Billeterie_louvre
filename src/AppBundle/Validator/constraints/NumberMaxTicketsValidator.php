<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 11/07/2018
 * Time: 10:07
 */

namespace AppBundle\Validator\Constraints;



use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\Common\Persistence\ObjectManager;

class NumberMaxTicketsValidator extends ConstraintValidator
{
    private $em;


    public function __construct(ObjectManager $em)
    {
        $this->em = $em;
    }

    public function validate($value, Constraint $constraint)
    {
        date_default_timezone_set('Europe/Paris');
        //Récupération de la date en chaîne de caractères
        $value = $value->format('Y-m-d');
        $value = new \DateTime($value);

        //Appel au repository
        $nbticket = $this->em->getRepository('AppBundle:Booking') -> findNumberTicketOneDate($value);
        dump($value);
        dump($nbticket);
        //Récupération du nombre de place réservés
        $booking = $this->context->getObject();
        $amount = $booking->getAmount();


        //vérifie que le nombre de réservations est inférieur à 1000
        if($nbticket + $amount >= 1000) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }

}