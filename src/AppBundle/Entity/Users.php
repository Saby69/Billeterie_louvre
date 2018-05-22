<?php
/**
 * Created by PhpStorm.
 * User: Raffi Miskdjian
 * Date: 22/05/2018
 * Time: 11:02
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Users
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
    private $name;

    /**
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $country;

    /**
     * @ORM\Column(type="string")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="string")
     */
    private $reduced_price;

    /**
     * @ORM\ManyToOne(targetEntity="Orders")
     */
    private $order_id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param mixed $birth_date
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return mixed
     */
    public function getReducedPrice()
    {
        return $this->reduced_price;
    }

    /**
     * @param mixed $reduced_price
     */
    public function setReducedPrice($reduced_price)
    {
        $this->reduced_price = $reduced_price;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId(Orders $order_id)
    {
        $this->order_id = $order_id;
    }


}

