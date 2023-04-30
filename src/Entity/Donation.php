<?php

namespace ProjetNormandie\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

/**
 * Donation
 *
 * @ORM\Table(name="cpt_donation")
 * @ORM\Entity(repositoryClass="ProjetNormandie\ComptaBundle\Repository\DonationRepository")
 */
class Donation implements TimestampableInterface
{
    use TimestampableTrait;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @Assert\NotNull
     * @ORM\Column(name="value", type="decimal", precision=7, scale=2)
     */
    private $value;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="dateDonation", type="datetime", nullable=false)
     */
    private $dateDonation;

    /**
     * @var UserInterface
     * @ORM\ManyToOne(targetEntity="ProjetNormandie\ComptaBundle\Entity\UserInterface", fetch="EAGER"))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id", nullable=true)
     * })
     */
    private $user;

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
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get value
     *
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param int $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get dateDonation
     * @return DateTime
     */
    public function getDateDonation()
    {
        return $this->dateDonation;
    }

    /**
     * Set dateDonation
     *
     * @param DateTime $dateDonation
     * @return $this
     */
    public function setDateDonation($dateDonation)
    {
        $this->dateDonation = $dateDonation;
        return $this;
    }

    /**
     * Get user
     * @return object
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param object $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('[%d]', $this->getId());
    }
}
