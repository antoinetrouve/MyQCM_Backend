<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\QuestionRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Question
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
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_At", type="datetime")
     */
    private $updatedAt;

    /**
    * @ORM\OneToOne(targetEntity="IIA\WebServiceBundle\Entity\Media", cascade={"remove"})
    */
    private $media;

    /**
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Answer", mappedBy="question")
    */
    private $answers;

    /**
    * @var \Mcq
    * 
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\Mcq", inversedBy="questions")
    * @ORM\JoinColumn(nullable=false)
    */
    private $mcq;


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
     * @return Question
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
     * Set created_at
     * @ORM\PrePersist
     * @param \DateTime $created_at
     * @return Question
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = new \DateTime();
        $this->updatedAt = new \DateTime();
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     * @ORM\PreUpdate
     * @param \DateTime $updated_at
     * @return Question
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = new \DateTime();
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set media
     *
     * @param \IIA\WebServiceBundle\Entity\Media $media
     * @return Question
     */
    public function setMedia(\IIA\WebServiceBundle\Entity\Media $media = null)
    {
        $this->media = $media;
        return $this;
    }

    /**
     * Get media
     *
     * @return \IIA\WebServiceBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answers
     *
     * @param \IIA\WebServiceBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\IIA\WebServiceBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;
        return $this;
    }

    /**
     * Remove answers
     *
     * @param \IIA\WebServiceBundle\Entity\Answer $answers
     */
    public function removeAnswer(\IIA\WebServiceBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set question
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $question
     * @return Question
     */
    public function setQuestion(\IIA\WebServiceBundle\Entity\Mcq $question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * Get question
     *
     * @return \IIA\WebServiceBundle\Entity\Mcq 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set mcq
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $mcq
     * @return Question
     */
    public function setMcq(\IIA\WebServiceBundle\Entity\Mcq $mcq)
    {
        $this->mcq = $mcq;
        return $this;
    }

    /**
     * Get mcq
     *
     * @return \IIA\WebServiceBundle\Entity\Mcq 
     */
    public function getMcq()
    {
        return $this->mcq;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Question
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
     * @return Question
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
