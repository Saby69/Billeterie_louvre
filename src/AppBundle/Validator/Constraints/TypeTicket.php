<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 11/07/2018
 * Time: 08:18
 */

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class typeTicket extends Constraint
{
     public $message = 'Au dela de 14h, vous ne pouvez plus commander de billet pour la journée';

}