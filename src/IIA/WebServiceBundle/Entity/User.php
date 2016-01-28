<?php

namespace IIA\WebServiceBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\UserRepository")
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
    * @ORM\ManyToMany(targetEntity="IIA\WebServiceBundle\Entity\TypeUser", cascade={"persist"})
    */
    private $typeUsers;

    /**
    * @ORM\OneToMany(targetEntity="IIA\WebServiceBundle\Entity\Result", mappedBy="user")
    */
    private $results;

    /**
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
    	$this->typeUsers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * @return User
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
     * Add typeUsers
     *
     * @param \IIA\WebServiceBundle\Entity\TypeUser $typeUsers
     * @return User
     */
    public function addTypeUser(\IIA\WebServiceBundle\Entity\TypeUser $typeUsers)
    {
        $this->typeUsers[] = $typeUsers;

        return $this;
    }

    /**
     * Remove typeUsers
     *
     * @param \IIA\WebServiceBundle\Entity\TypeUser $typeUsers
     */
    public function removeTypeUser(\IIA\WebServiceBundle\Entity\TypeUser $typeUsers)
    {
        $this->typeUsers->removeElement($typeUsers);
    }

    /**
     * Get typeUsers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypeUsers()
    {
        return $this->typeUsers;
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
}
