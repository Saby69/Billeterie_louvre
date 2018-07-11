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
        $value = new \DateTime();


        if(!empty($value) && $value== "d") {
            // Récupération de l'heure
            date_default_timezone_set('Europe/Paris');
            $hour = date('H');
            // Test de l'heure pour le billet journée
            if ($hour >= 14) {
                // erreur si l'heure est supérieure à 14 h
                $this->context->buildViolation($constraint->message)
                    ->addViolation();
            }
        }
    }

}