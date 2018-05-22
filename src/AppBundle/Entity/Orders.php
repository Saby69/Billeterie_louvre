<?php
/**
 * Created by PhpStorm.
 * User: Raffi Miskdjian
 * Date: 22/05/2018
 * Time: 10:44
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="orders")
 */
class Orders
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $date;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\Column(type="string")
     */
    private $amount;

    /**
     * @ORM\Column(type="string")
     */
    private $mail;

    /**
     * @ORM\Column(type="string")
     */
    private $total_price;

    /**
     * @ORM\Column(type="string")
     */
    private $stripe_transaction;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * @param mixed $total_price
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;
    }

    /**
     * @return mixed
     */
    public function getStripeTransaction()
    {
        return $this->stripe_transaction;
    }

    /**
     * @param mixed $stripe_transaction
     */
    public function setStripeTransaction($stripe_transaction)
    {
        $this->stripe_transaction = $stripe_transaction;
    }


}