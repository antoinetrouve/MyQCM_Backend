<?php

namespace IIA\WebServiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Result
 *
 * @ORM\Table(name="result")
 * @ORM\Entity(repositoryClass="IIA\WebServiceBundle\Repository\ResultRepository")
 */
class Result
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
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_completed", type="boolean")
     */
    private $isCompleted;

    /**
    * @var \User
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\User", inversedBy="results")
    */
    private $user;

    /**
    * @var \Mcq
    * @ORM\ManyToOne(targetEntity="IIA\WebServiceBundle\Entity\Mcq", inversedBy="results")
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
     * Set score
     *
     * @param integer $score
     * @return Result
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set isCompleted
     *
     * @param boolean $isCompleted
     * @return Result
     */
    public function setIsCompleted($isCompleted)
    {
        $this->isCompleted = $isCompleted;

        return $this;
    }

    /**
     * Get isCompleted
     *
     * @return boolean 
     */
    public function getIsCompleted()
    {
        return $this->isCompleted;
    }

    /**
     * Set user
     *
     * @param \IIA\WebServiceBundle\Entity\User $user
     * @return Result
     */
    public function setUser(\IIA\WebServiceBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \IIA\WebServiceBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set mcq
     *
     * @param \IIA\WebServiceBundle\Entity\Mcq $mcq
     * @return Result
     */
    public function setMcq(\IIA\WebServiceBundle\Entity\Mcq $mcq = null)
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
}
