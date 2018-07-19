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
        $day = $date->format('w');
        //récupération du jour et du mois
        $dayandmonth = $date->format('d/m');

        //contrainte fermeture dimanche
        if ($day === '0')
        {
            $this->context->buildViolation($constraint->sunday)

                ->addViolation();
        }
        //contrainte fermeture mardi
        elseif ($day === '2')
        {
            $this->context->buildViolation($constraint->tuesday)

                ->addViolation();
        }
        //contrainte fermeture 1er mai
        elseif ($dayandmonth === '01/05')
        {
            $this->context->buildViolation($constraint->firstmay)

                ->addViolation();
        }
        //contrainte fermeture 1er novembre
        elseif ($dayandmonth === '01/11')
        {
            $this->context->buildViolation($constraint->firstnovember)

                ->addViolation();
        }
        //contrainte fermeture Noël
        elseif ($dayandmonth === '25/12')
        {
            $this->context->buildViolation($constraint->christmas)

                ->addViolation();
        }


    }
}




