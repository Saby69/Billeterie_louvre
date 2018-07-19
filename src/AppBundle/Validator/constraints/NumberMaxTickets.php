<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 11/07/2018
 * Time: 10:06
 */

namespace AppBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */

class NumberMaxTickets extends Constraint
{
    public $message = "Il n'y a plus de place disponible pour cette date. Veuillez en choisir une autre !";
}