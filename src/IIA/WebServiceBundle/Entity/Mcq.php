<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mcq
 *
 * @ORM\Table(name="mcq")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\McqRepository")
 * @ORM\HasLifecycleCallbacks()
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
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Question", mappedBy="mcq")
    */
    private $questions;

    /**
    * @var \Category
    * 
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\Category", inversedBy="mcqs")
    * @ORM\JoinColumn(nullable=false)
    */
    private $category;

    /**
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Result", mappedBy="mcq")
    */
    private $results;


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
     * @ORM\PrePersist
     * @param \DateTime $createdAt
     * @return Mcq
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
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
     * @ORM\PreUpdate
     * @param \DateTime $updatedAt
     * @return Mcq
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add questions
     *
     * @param \IIA\WebServiceBundle\Entity\Question $questions
     * @return Mcq
     */
    public function addQuestion(\IIA\WebServiceBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \IIA\WebServiceBundle\Entity\Question $questions
     */
    public function removeQuestion(\IIA\WebServiceBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set category
     *
     * @param \IIA\WebServiceBundle\Entity\Category $category
     * @return Mcq
     */
    public function setCategory(\IIA\WebServiceBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \IIA\WebServiceBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add results
     *
     * @param \IIA\WebServiceBundle\Entity\Result $results
     * @return Mcq
     */
    public function addResult(\IIA\WebServiceBundle\Entity\Result $results)
    {
        $this->results[] = $results;

        return $this;
    }

    /**
     * Remove results
     *
     * @param \IIA\WebServiceBundle\Entity\Result $results
     */
    public function removeResult(\IIA\WebServiceBundle\Entity\Result $results)
    {
        $this->results->removeElement($results);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResults()
    {
        return $this->results;
    }
}
