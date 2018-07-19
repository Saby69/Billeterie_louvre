<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 11/07/2018
 * Time: 08:19
 */

namespace AppBundle\Validator\Constraints;



use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TypeTicketValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint)
    {

        date_default_timezone_set('Europe/Paris');
        //Récupération de l'heure
        $hour = date('H');
        //Récupération de la date de réservation
        $booking = $this->context->getObject();
        $visitday = $booking->getDate();
        //Récupération de la date du jour
        $day = new \DateTime("NOW");


        //Contrainte qui vérifie que c'est aujourd'hui, qu'il est plus de 14h et que le type journée à été sélectionné
        if($visitday < $day && $hour >= "04" && $value == "d") {
            $this->context->buildViolation($constraint->message)
                ->addViolation();



        }
    }

}