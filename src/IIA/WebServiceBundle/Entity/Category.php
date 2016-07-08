<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\PreUpdate;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 * @ExclusionPolicy("all")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * 
     * @Expose
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Expose()
     * 
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Expose()
     */
    private $updatedAt;

    /**
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Mcq", mappedBy="category")
    * 
    */
    private $mcqs;


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
     * @return Category
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
     * Set createdAt
     * @ORM\PrePersist
     * @param \DateTime $createdAt
     * @return Category
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
     * @PreUpdate
     * @param \DateTime $updatedAt
     * @return Category
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
        $this->mcqs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mcqs
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $mcqs
     * @return Category
     */
    public function addMcq(\IIA\WebServiceBundle\Entity\Mcq $mcqs)
    {
        $this->mcqs[] = $mcqs;
        return $this;
    }

    /**
     * Remove mcqs
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $mcqs
     */
    public function removeMcq(\IIA\WebServiceBundle\Entity\Mcq $mcqs)
    {
     	foreach ($this->mcqs as $k => $m) {
     		if ($m->getId() == $mcqs->getId()) {
     			unset($this->mcqs[$k]);
     		}
     	}
        //$this->mcqs->removeElement($mcqs);
    }

    /**
     * Get mcqs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMcqs()
    {
        return $this->mcqs;
    }
    
    public function __toString(){
    	return (string)$this->name;
    }
}
