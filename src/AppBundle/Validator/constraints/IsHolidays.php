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
    public $sunday = 'Le Louvre est fermé le dimanche.';
    public $tuesday = 'Le Louvre est fermé le mardi.';
    public $firstmay = 'Le Louvre est fermé le 1er mai.';
    public $firstnovember = 'Le Louvre est fermé le 1er novembre.';
    public $christmas = 'Le Louvre est fermé pour Noël.';


}