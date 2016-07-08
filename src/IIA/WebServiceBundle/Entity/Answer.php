<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\PrePersist;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Answer
 *
 * @ORM\Table(name="answer")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\AnswerRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 * @ExclusionPolicy("all")
 */
class Answer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     * 
     * @Expose
     */
    private $value;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Valid", type="boolean")
     * 
     * @Expose
     */
    private $isValid;

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
     * 
     * @Expose
     */
    private $updatedAt;

    /**
    * @var \Question
    * 
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\Question", inversedBy="answers")
    * @ORM\JoinColumn(nullable=false)
    * 
    * @Expose
    */
    private $question;


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
     * Set value
     *
     * @param string $value
     * @return Answer
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set isValid
     *
     * @param boolean $isValid
     * @return Answer
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
        return $this;
    }

    /**
     * Get isValid
     *
     * @return boolean 
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set createdAt
     * @PrePersist
     * @param \DateTime $createdAt
     * @return Answer
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
     * @return Answer
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
     * Set question
     *
     * @param \IIA\WebServiceBunde\Entity\Question $question
     * @return Answer
     */
    public function setQuestion(\IIA\WebServiceBundle\Entity\Question $question = null)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * Get question
     *
     * @return \IIA\WebServiceBunde\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
    
    public function __toString(){
    	return (string)$this->value;
    }
}
