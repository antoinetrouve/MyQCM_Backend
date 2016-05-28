<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Team;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use IIA\WebServiceBundle\EntityJson\UserJson;


class UserRestController extends Controller
{
	/**
	 * User flow information
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
		$userJson->setLastLogin($user->getLastLogin());
		$userJson->setCreatedAt($user->getCreatedAt());
		$userJson->setUpdatedAt($user->getUpdatedAt());
		
		return $userJson;
	}
	
	/**
	 * Not used
	 * @param string $username
	 */
	public function postUserProfilAction($username){
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
	
	/**
	 * Validate user authentification
	 * @return boolean
	 */
	public function postUserauthAction(){
		$login = $this->getRequest()->get('login');
		$pwd = $this->getRequest()->get('password');

		$user_manager = $this->get('fos_user.user_manager');
		$factory = $this->get('security.encoder_factory');
		$user = $user_manager->findUserByUsername($login);

		if (is_null($user)){
			$bool = false;
			return $bool;
		}
		$encoder = $factory->getEncoder($user);
		$bool = ($encoder->isPasswordValid($user->getPassword(),$pwd,$user->getSalt())) ? true : false;
		
		return $bool;
	}
	
	/**
	 * Remove duplicate mcq before to send user's json flux
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