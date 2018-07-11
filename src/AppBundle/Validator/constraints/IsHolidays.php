<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 04/07/2018
 * Time: 09:23
 */

namespace AppBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;


/**
 * @Annotation
 */
class IsHolidays extends Constraint
{
    public $message = 'Désolé, nous sommes fermés ce jour là, veuillez choisir une autre date.';


}