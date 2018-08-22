<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RateRepository")
 */
class Rate
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="ratenormal", type="integer")
     */
    private $ratenormal;

    /**
     * @var int
     *
     * @ORM\Column(name="ratechildren", type="integer")
     */
    private $ratechildren;

    /**
     * @var int
     *
     * @ORM\Column(name="ratebaby", type="integer")
     */
    private $ratebaby;

    /**
     * @var int
     *
     * @ORM\Column(name="ratesenior", type="integer")
     */
    private $ratesenior;

    /**
     * @var int
     *
     * @ORM\Column(name="ratereduc", type="integer")
     */
    private $ratereduc;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ratenormal
     *
     * @param integer $ratenormal
     *
     * @return Rate
     */
    public function setRatenormal($ratenormal)
    {
        $this->ratenormal = $ratenormal;

        return $this;
    }

    /**
     * Get ratenormal
     *
     * @return int
     */
    public function getRatenormal()
    {
        return $this->ratenormal;
    }

    /**
     * Set ratechildren
     *
     * @param integer $ratechildren
     *
     * @return Rate
     */
    public function setRatechildren($ratechildren)
    {
        $this->ratechildren = $ratechildren;

        return $this;
    }

    /**
     * Get ratechildren
     *
     * @return int
     */
    public function getRatechildren()
    {
        return $this->ratechildren;
    }

    /**
     * Set ratebaby
     *
     * @param integer $ratebaby
     *
     * @return Rate
     */
    public function setRatebaby($ratebaby)
    {
        $this->ratebaby = $ratebaby;

        return $this;
    }

    /**
     * Get ratebaby
     *
     * @return int
     */
    public function getRatebaby()
    {
        return $this->ratebaby;
    }

    /**
     * Set ratesenior
     *
     * @param integer $ratesenior
     *
     * @return Rate
     */
    public function setRatesenior($ratesenior)
    {
        $this->ratesenior = $ratesenior;

        return $this;
    }

    /**
     * Get ratesenior
     *
     * @return int
     */
    public function getRatesenior()
    {
        return $this->ratesenior;
    }

    /**
     * Set ratereduc
     *
     * @param integer $ratereduc
     *
     * @return Rate
     */
    public function setRatereduc($ratereduc)
    {
        $this->ratereduc = $ratereduc;

        return $this;
    }

    /**
     * Get ratereduc
     *
     * @return int
     */
    public function getRatereduc()
    {
        return $this->ratereduc;
    }
}

