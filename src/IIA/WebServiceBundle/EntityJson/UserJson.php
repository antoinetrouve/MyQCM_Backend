<?php

namespace IIA\WebServiceBundle\EntityJson;

use JMS\Serializer\Annotation\Type;

/**
 * 
 * @author antoine Trouvé
 * Class to transform a user's to a user with information for json flow in an object
 */
class UserJson {

	/**
	 * user's id
	 * @Type("integer")
	 */
	private $id;

	/**
	 * User's name
	 * @Type("string")
	 */
	private $username;
	
	/**
	 * User's email
	 * @Type("string")
	 */
	private $email;
	
	/**
	 * User's last login
	 * @Type("DateTime")
	 */
	private $lastlogin;
	
	/**
	 * User's created date
	 * @Type("DateTime")
	 */
	private $createdAt;
	
	/**
	 * User's updated date
	 * @Type("DateTime")
	 */
	private $updatedAt;
	
	/**
	 * User's password
	 * @Type("string")
	 */
	private $password;
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	
	public function getLastlogin() {
		return $this->lastlogin;
	}
	public function setLastlogin($lastlogin) {
		$this->lastlogin = $lastlogin;
		return $this;
	}
	
	public function getCreatedAt() {
		return $this->createdAt;
	}
	public function setCreatedAt($createdAt) {
		$this->createdAt = $createdAt;
		return $this;
	}
	
	public function getUpdatedAt() {
		return $this->updatedAt;
	}
	public function setUpdatedAt($updatedAt) {
		$this->updatedAt = $updatedAt;
		return $this;
	}

	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	
	/**
	 * UserJson class constructor
	 */
	public function  __construct(){}



}