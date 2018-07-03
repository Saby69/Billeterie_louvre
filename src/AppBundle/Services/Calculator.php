<?php
/**
 * Created by PhpStorm.
 * User: Sabrina
 * Date: 28/06/2018
 * Time: 09:09
 */

namespace AppBundle\Services;


class Calculator
{
    public function recoverTicket()
    {
        $amount = 0;
        for($i=1; $i<=$amount;$i++) {


            $this->totalTicket($amount[$i]);
            $this->total();
        }


        return $amount;
    }




    private function total()
    {


        /*$today = getdate();
        $age = $today - $birthdate;

        echo $age;*/
    }

    private function totalTicket($tickets)
    {


    }
}