<?php

namespace IIA\WebServiceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
    * @var \Team
    * 
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\Team", inversedBy="users")
    */
    private $team;
    
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
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Result", mappedBy="user")
    */
    private $results;
    
    /**
     * @ORM\ManyToMany(targetEntity="IIA\WebServiceBundle\Entity\Mcq", cascade={"persist"})
     * 
     */
    private $mcqs;

    /**
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
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
     * @ORM\PrePersist
     * Set createdAt
     * @param \DateTime $createdAt
     * @return User
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
     * @ORM\PreUpdate
     * Set updatedAt
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();
        return $this;
    }

    /**
     * @ORM\PreUpdate
     * Get updatedAt
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set team
     *
     * @param \IIA\WebServiceBundle\Entity\Team $team
     * @return User
     */
    public function setTeam(\IIA\WebServiceBundle\Entity\Team $team)
    {
        $this->team = $team;
        return $this;
    }

    /**
     * Get team
     *
     * @return \IIA\WebServiceBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Add results
     *
     * @param \IIA\WebServiceBundle\Entity\Result $results
     * @return User
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

    /**
     * Add mcqs
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $mcqs
     * @return User
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
}
