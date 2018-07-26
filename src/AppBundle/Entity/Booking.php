<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Validator\Constraints as BookingAssert;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BookingRepository")
 */
class Booking
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     * @Assert\NotBlank(message = "Veuillez choisir une date")
     * @Assert\GreaterThanOrEqual("today", message="Impossible de choisir une date antérieur à aujourd'hui !")
     * @BookingAssert\IsHolidays()
     * @BookingAssert\NumberMaxTickets()
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez choisir si vous souhaitez une entrée pour la journée ou la demi-journée !")
     * @BookingAssert\TypeTicket()
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="amount", type="integer")
     * @Assert\NotBlank(message = "Veuillez sélectionner un nombre de place !")
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez saisir une adresse mail !")
     * @Assert\Email(message = "Veuillez saisir une adresse mail valide !")
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="total_price", type="string", length=255, nullable=true)
     */
    private $totalPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="stripe_transaction", type="string", length=255, nullable=true)
     */
    private $stripeTransaction;


    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Information" , mappedBy="booking", cascade={"persist"})
     */
    private $informations;







    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Booking
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Booking
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Booking
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Booking
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set totalPrice
     *
     * @param string $totalPrice
     *
     * @return Booking
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return string
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set stripeTransaction
     *
     * @param string $stripeTransaction
     *
     * @return Booking
     */
    public function setStripeTransaction($stripeTransaction)
    {
        $this->stripeTransaction = $stripeTransaction;

        return $this;
    }

    /**
     * Get stripeTransaction
     *
     * @return string
     */
    public function getStripeTransaction()
    {
        return $this->stripeTransaction;
    }

    /**
     * @param mixed $informations
     */
    public function setInformations($informations)
    {
        $this->informations = $informations;
    }

    /**
     * Add information
     *
     * @param \AppBundle\Entity\Information $information
     *
     * @return Booking
     */
    public function addInformation(\AppBundle\Entity\Information $information)
    {
        $this->informations[] = $information;
        $information->setBooking($this);

        return $this;
    }



    /**
     * Remove information
     *
     * @param \AppBundle\Entity\Information $information
     */
    public function removeInformation(\AppBundle\Entity\Information $information)
    {
        $this->informations->removeElement($information);
    }

    /**
     * Get informations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInformations()
    {
        return $this->informations;
    }
}
