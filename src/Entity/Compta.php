<?php

namespace ProjetNormandie\ComptaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TimestampableInterface;
use Knp\DoctrineBehaviors\Model\Timestampable\TimestampableTrait;

/**
 * Donation
 *
 * @ORM\Table(name="cpt_compta")
 * @ORM\Entity
 */
class Compta implements TimestampableInterface
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
     * @var double
     *
     * @ORM\Column(name="value", type="decimal")
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="month", type="string")
     */
    private $month;

    /**
     * @var Source
     * @ORM\ManyToOne(targetEntity="ProjetNormandie\ComptaBundle\Entity\Source", fetch="EAGER"))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSource", referencedColumnName="id", nullable=false)
     * })
     */
    private $source;

    /**
     * @var Type
     * @ORM\ManyToOne(targetEntity="ProjetNormandie\ComptaBundle\Entity\Type", fetch="EAGER"))
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idType", referencedColumnName="id", nullable=false)
     * })
     */
    private $type;

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
     * @param double $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get month
     *
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set month
     *
     * @param string $month
     * @return $this
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }


    /**
     * Get source
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set source
     *
     * @param Source $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * Get type
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param Type $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s %s [%d]', $this->getMonth(), $this->getSource()->getLabel(), $this->getId());
    }
}
