<?php

namespace IIA\WebServiceBundle\EntityJson;

use JMS\Serializer\Annotation\Type;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * 
 * @author antoine Trouvé
 * Class to transform a user's answers list json flow in an object
 */
class ResultJson {

	/**
	 * result's id
	 * @Type("integer")
	 */
	private $id;

	/**
	 * User's identifiant
	 * @Type("integer")
	 */
	private $idUser;
	
	/**
	 * Mcq's identifiant
	 * @Type("integer")
	 */
	private $idMcq;

	/**
	 * Array list of answer's id
	 * @Type("array")
	 */
	private $ListIdAnswer;


	/**
	 * Get id
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set id
	 * @param integer $id
	 * @return ResultJson
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * Get user's id
	 * @return integer
	 */
	public function getIdUser() {
		return $this->idUser;
	}

	/**
	 * Set user's id
	 * @param integer $idUser
	 * @return ResultJson
	 */
	public function setIdUser($idUser) {
		$this->idUser = $idUser;
		return $this;
	}

	/**
	 * Get Mcq's id
	 * @return integer
	 */
	public function getIdMcq() {
		return $this->idMcq;
	}

	/**
	 * Set Mcq's id
	 * @param integer $idMcq
	 * @return ResultJson
	 */
	public function setIdMcq($idMcq) {
		$this->idMcq = $idMcq;
		return $this;
	}

	/**
	 * Get list answer's id
	 * @return array
	 */
	public function getListIdAnswer() {
		return $this->ListIdAnswer;
	}

	/**
	 * Set list answer's id
	 * @param array $ListIdServerAnswer
	 * @return ResultJson
	 */
	public function setListIdAnswer($ListIdAnswer) {
		$this->ListIdAnswer = $ListIdAnswer;
		return $this;
	}
	
	/**
	 * Add answer's id into array list
	 * @param array $results
	 */
	public function addListIdAnswer($IdAnswer)
	{
		$this->ListIdAnswer[] = $IdAnswer;
		return $this;
	}
	
	/**
	 * ResultJson class constructor
	 */
	public function  __construct()
	{
		$this->ListIdAnswer = new ArrayCollection();
	}

}