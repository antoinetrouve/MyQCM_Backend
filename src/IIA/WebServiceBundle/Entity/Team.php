<?php

namespace IIA\WebServiceBundle\Entity;

use FOS\UserBundle\Model\ Group as BaseGroup;
use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\TeamRepository")
 */
class Team extends BaseGroup
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
     * @var string
     * 
     * @ORM\Column(name="title", type="string")
     */
    private $title;
    
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
    * @ORM\ManyToMany(targetEntity="IIA\WebServiceBundle\Entity\Mcq", cascade={"persist"})
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
     *
     * @param \DateTime $createdAt
     * @return Team
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
     * @return Team
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
     * Constructor
     */
    public function __construct()
    {
    	parent::__construct();
        $this->mcqs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mcqs
     * 
     * @param \IIA\WebServiceBundle\Entity\Qcm $mcqs
     * @return Team
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
     * Set title
     *
     * @param string $title
     * @return Team
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
