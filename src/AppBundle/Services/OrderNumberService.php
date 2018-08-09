<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 08/08/2018
 * Time: 17:09
 */

namespace AppBundle\Services;


class OrderNumberService
{
    function ramdomNumber($length, $listCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $string = '';
        $max = mb_strlen($listCar, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $string .= $listCar[random_int(0, $max)];
        }
        return $string;
    }

}