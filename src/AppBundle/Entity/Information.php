<?php

namespace AppBundle\Entity;



use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Information
 *
 * @ORM\Table(name="information")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InformationRepository")
 */


class Information
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez saisir votre nom !")
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Votre nom doit contenir plus de {{ limit }} caractères !",
     *      maxMessage = "Votre nom doit contenir moins de {{ limit }} caractères !"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez saisir votre prénom")
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Votre prénom doit contenir plus de {{ limit }} caractères !",
     *      maxMessage = "Votre prénom doit contenir moins de {{ limit }} caractères !"
     * )
     */

    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Assert\NotBlank(message = "Veuillez sélectionner un pays !")
     */
    private $country;

    /**
     * @@var \DateTime
     *
     * @ORM\Column(name="birth_date", type="date")
     * @Assert\NotBlank(message = "Veuillez saisir votre date de naissance")
     * @Assert\LessThanOrEqual("today", message="Impossible de choisir une date supérieur à aujourd'hui !")

     */
    private $birthDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="reduced_price", type="boolean")
     *
     */
    private $reducedPrice;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Booking", inversedBy="informations")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="id", nullable=false)
    */
    private $booking;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_ticket", type="integer")
     */
    private $priceTicket;

    /**
     * @return int
     */
    public function getPriceTicket()
    {
        return $this->priceTicket;
    }

    /**
     * @param int $priceTicket
     */
    public function setPriceTicket($priceTicket)
    {
        $this->priceTicket = $priceTicket;
    }








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
     * Set name
     *
     * @param string $name
     *
     * @return Information
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Information
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Information
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Information
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set reducedPrice
     *
     * @param boolean $reducedPrice
     *
     * @return Information
     */
    public function setReducedPrice($reducedPrice)
    {
        $this->reducedPrice = $reducedPrice;

        return $this;
    }

    /**
     * Get reducedPrice
     *
     * @return boolean
     */
    public function getReducedPrice()
    {
        return $this->reducedPrice;
    }

    /**
     * Set booking
     *
     * @param \AppBundle\Entity\Booking $booking
     *
     * @return Information
     */
    public function setBooking(\AppBundle\Entity\Booking $booking)
    {
        $this->booking = $booking;

        return $this;
    }

    /**
     * Get booking
     *
     * @return \AppBundle\Entity\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Information::class,
        ));
    }
}

