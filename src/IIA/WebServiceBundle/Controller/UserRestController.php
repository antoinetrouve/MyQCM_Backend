<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Team;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;

class UserRestController extends Controller
{
	public function getUserAction($username){
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByUsername($username);
		$userJson = $this->RemoveDuplicateMcq($user);
		if(!is_object($userJson)){
			throw $this->createNotFoundException();
		}
		return $userJson;
	}
	
	public function getUsersAction(){
		$users = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findAll();
		return $users;
	}
	
	/**
	 * Validate user authentification
	 * @return boolean
	 */
	public function postUserauthAction(){
		$factory = $this->get('security.encoder_factory');
		$login = $this->getRequest()->get('login');
		$pwd = $this->getRequest()->get('password');
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findByUsername($login);
		if (is_null($user)){
			$bool = false;
			return $bool;
		}
		$encoder = $factory->getEncoder($user);
		$bool = ($encoder->isPasswordValid($user->getPassword(),$pwd,$user->getSalt())) ? "true" : "false";
		
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