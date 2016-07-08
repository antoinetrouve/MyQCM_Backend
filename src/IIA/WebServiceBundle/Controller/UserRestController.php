<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Team;
use IIA\WebServiceBundle\EntityJson\UserJson;


class UserRestController extends Controller
{
	/**
	 * Not used
	 * User flow informations
	 * @return json
	 */
	public function postUserinformationAction(){
		$username = $this->getRequest()->get('username');
		$temp = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByUsername($username);
		
		$user = $this->RemoveDuplicateMcq($temp);
		if(!is_object($user)){
			throw $this->createNotFoundException();
		}
		
		//Create user with specific information to create json flow
		$userJson = new UserJson();
		$userJson->setId($user->getId());
		$userJson->setUsername($user->getUsername());
		$userJson->setEmail($user->getEmail());
		$userJson->setPassword($user->getPassword());
		$userJson->setLastLogin($user->getLastLogin());
		$userJson->setCreatedAt($user->getCreatedAt());
		$userJson->setUpdatedAt($user->getUpdatedAt());
		
		return $userJson;
	}
	
	/**
	 * User flow informations after user is authentificated
	 * @param User user
	 * @return userJson
	 */
	private function CreateFlowUserInformation($user){
	
		$temp = $this->RemoveDuplicateMcq($user);
		if(!is_object($temp)){
			throw $this->createNotFoundException();
		}

		//Create user with specific information to create json flow
		$userJson = new UserJson();
		$userJson->setId($temp->getId());
		$userJson->setUsername($temp->getUsername());
		$userJson->setEmail($temp->getEmail());
		$userJson->setPassword($temp->getPassword());
		$userJson->setLastLogin($temp->getLastLogin());
		$userJson->setCreatedAt($temp->getCreatedAt());
		$userJson->setUpdatedAt($temp->getUpdatedAt());
	
		return $userJson;
	}
	
	/**
	 * Not used
	 * @param string $username
	 */
	public function postUserProfilAction(){
		$username = $this->getRequest()->get('username');
		$temp = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByUsername($username);
		$user = new User();
		$user->setUsername($temp->getUsername());
		$user->setEmail($temp->getEmail());
		$user->setLastLogin($temp->getLastLogin());
		$user->setCreatedAt($temp->getCreatedAt());
		$user->setUpdatedAt($temp->getUpdatedAt());
		return $user;
	}
	
	/**
	 * All users and their information
	 * @return json
	 */
	public function getUsersAction(){
		$users = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findAll();
		return $users;
	}
	
	public function getUserAction($username){
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByUsername($username);
		$mcqUser = array();
		$mcqTeam = array();
		 
		$team = new Team();
		 
		// get the list of Team
		$team = $user->getTeam();
		var_dump($team);
		
		die();
		// get the list of mcq_id into my user
		foreach ($user->getMcqs() as $mcq){
			array_push($mcqUser, $mcq->getId());
		}
		
		foreach ($team->getMcqs() as $mcq){
			array_push($mcqTeam, $mcq->getId());
		}
		 
		// if we have diffrence in this 2 two add the diff in user mcq
		$diff = array();
		
		$diff = array_diff($mcqTeam, $mcqUser);
		 
		foreach ($diff as $mcq_id){
			$user->AddMcq($this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneById($mcq_id));
		}
		 
		if(!is_object($user)){
			throw $this->createNotFoundException();
		}
		return $user;
	}
	
	/**
	 * Validate user authentification
	 * if user authentificated return user's json information
	 * else return false
	 * @return json information
	 */
	public function postUserauthAction(){
		$login = $this->getRequest()->get('login');
		$pwd = $this->getRequest()->get('password');

		$user_manager = $this->get('fos_user.user_manager');
		$factory = $this->get('security.encoder_factory');
		$user = $user_manager->findUserByUsername($login);

		//If no user
		if (is_null($user)){
			return false;
		}else{
			//user's Authentification verification
			$encoder = $factory->getEncoder($user);
			$bool = ($encoder->isPasswordValid($user->getPassword(),$pwd,$user->getSalt())) ? true : false;

			//if user authentificated
			if ($bool == true){
				$userJson = new UserJson();
				$userJson = self::CreateFlowUserInformation($user);
				return $userJson; 
			}else{
				return false;
			}
		}
		return false;
	}
	
	/**
	 * Remove duplicate mcq before to send user's json flow
	 * @param User $user
	 * @return $userWithoutDuplicate
	 */
	public function RemoveDuplicateMcq($user) {
		$mcqUser = array();
		$mcqTeam = array();
		$diff = array();
		
		$team = new Team();
		$team = $user->getTeam();
		if ($team != null)
		{
			//Get Mcq's id in team's user
			foreach ($team->getMcqs() as $mcq)
			{
				//Insert Mcq's id in team's user in array
				array_push($mcqTeam, $mcq->getId());
			}
			
			//Get Mcq's id in team's user
			foreach ($user->getMcqs() as $mcq){
				array_push($mcqUser, $mcq->getId());
			}
			
			/*Manage difference between two arrays*/
			//Return list mcq's id missing in mcqUser Array
			$diff = array_diff($mcqTeam, $mcqUser);

			//Add Mcq in user 
			foreach ($diff as $mcq_id){
				$user->AddMcq($this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneById($mcq_id));
			}
		}
		return $user;
	}
}