<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mcq
 *
 * @ORM\Table(name="mcq")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\McqRepository")
 */
class Mcq
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
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Actif", type="boolean")
     */
    private $isActif;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="countdown", type="time")
     */
    private $countdown;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diffDeb", type="datetime")
     */
    private $diffDeb;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="diffEnd", type="datetime")
     */
    private $diffEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;


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
     * @return Mcq
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
     * Set is_Actif
     *
     * @param boolean $isActif
     * @return Mcq
     */
    public function setIsActif($isActif)
    {
        $this->isActif = $isActif;

        return $this;
    }

    /**
     * Get is_Actif
     *
     * @return boolean 
     */
    public function getIsActif()
    {
        return $this->isActif;
    }

    /**
     * Set countdown
     *
     * @param \DateTime $countdown
     * @return Mcq
     */
    public function setCountdown($countdown)
    {
        $this->countdown = $countdown;

        return $this;
    }

    /**
     * Get countdown
     *
     * @return \DateTime 
     */
    public function getCountdown()
    {
        return $this->countdown;
    }

    /**
     * Set diffDeb
     *
     * @param \DateTime $diffDeb
     * @return Mcq
     */
    public function setDiffDeb($diffDeb)
    {
        $this->diffDeb = $diffDeb;

        return $this;
    }

    /**
     * Get diffDeb
     *
     * @return \DateTime 
     */
    public function getDiffDeb()
    {
        return $this->diffDeb;
    }

    /**
     * Set diffEnd
     *
     * @param \DateTime $diffEnd
     * @return Mcq
     */
    public function setDiffEnd($diffEnd)
    {
        $this->diffEnd = $diffEnd;

        return $this;
    }

    /**
     * Get diffEnd
     *
     * @return \DateTime 
     */
    public function getDiffEnd()
    {
        return $this->diffEnd;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Mcq
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Mcq
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
