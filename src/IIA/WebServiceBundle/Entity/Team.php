<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Team
 *
 * @ORM\Table(name="Team")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\TeamRepository")
 * @ORM\HasLifecycleCallbacks()
 * @ExclusionPolicy("All")
 */
class Team {
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose()
     */
    private $id;
    
    /**
     * @var name
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Expose()
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Expose()
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
    * @ORM\ManyToMany(targetEntity="IIA\WebServiceBundle\Entity\Mcq", cascade={"persist"})
    * @Expose()
    */
    private $mcqs;

    /**
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\User", mappedBy="team")
    */
    private $users;


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
     * Set createdAt
     * @ORM\PrePersist
     * @param \DateTime $createdAt
     * @return Team
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
     * @return Team
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
     * @param \IIA\WebServiceBundle\Entity\Qcm $mcqs
     */
    public function addMcq(\IIA\WebServiceBundle\Entity\Mcq $mcqs)
    {
        $this->mcqs[] = $mcqs;
        return $this;
    }

    /**
     * Remove mcqs
     *
     * @param \IIA\WebServiceBundle\Entity\Qcm $mcqs
     */
    public function removeMcq(\IIA\WebServiceBundle\Entity\Mcq $mcqs)
    {
        $this->mcqs->removeElement($mcqs);
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

    /**
     * Add users
     *
     * @param \IIA\WebServiceBundle\Entity\User $users
     * @return Team
     */
    public function addUser(\IIA\WebServiceBundle\Entity\User $users)
    {
        $this->users[] = $users;
        return $this;
    }

    /**
     * Remove users
     *
     * @param \IIA\WebServiceBundle\Entity\User $users
     */
    public function removeUser(\IIA\WebServiceBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Team
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
    
    public function __toString(){
    	return (string)$this->getName();
    }
}
