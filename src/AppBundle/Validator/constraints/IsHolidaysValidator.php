<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 04/07/2018
 * Time: 09:24
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class IsHolidaysValidator extends ConstraintValidator
{

    public function validate($date, Constraint $constraint)
    {

        //récupération du jour de la semaine au format numérique
        $date = date('w');
        //à correspond à dimanche et 2 à mardi
        if ($date === '0' || $date  === '2')
        {
            $this->context->buildViolation($constraint->message)

                ->addViolation();
        }



    }
}




