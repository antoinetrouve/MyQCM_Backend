<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Mcq;
use IIA\WebServiceBundle\Entity\Category;
use IIA\WebServiceBundle\Controller\CategoryRestController;

class McqRestController extends Controller
{
	public function getMcqAction($name){
		$mcq = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneByName($name);
		if(!is_object($mcq)){
			throw $this->createNotFoundException();
		}
		return $mcq;
	}
	
	public function getMcqsAction(){
		$mcqs = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findAll();
		return $mcqs;
	}
	
	public function getMcqquestionsAction($mcq_id) {
		$mcq = new Mcq();
		$mcq = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneById($mcq_id);
		$questions = $mcq->getQuestions();
		return $questions;
	}
	
	public function getMcqsuserAction($user_id = 1, $category_id = 3){
		//$user_id = $this->getRequest()->get('userId');
		//$category_id = $this->getRequest()->get('categoryId');
		$user = new User();
		$mcq = new Mcq();
		$listMcqIds = array();
		$mcqs = array();
		
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneById($user_id);

		//If user has a team
		if ($user->getTeam() != null){
			//Get list mcq id
			$listMcqIds = CategoryRestController::getMcqList($user->getTeam(), $user);
			//Get Category 's mcqs
			foreach ($listMcqIds as $mcq_id){
				//Get mcq
				$mcq = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneById($mcq_id);
				//get mcq user is in category selected by user
				if ($mcq->getCategory()->getId() == $category_id){
					array_push($mcqs, $mcq);
				}
			}
		}
		else{
			//Get list user's category mcq id
			foreach ($user->getMcqs() as $mcq){
				if ($mcq->getCategory()->getId() == $category_id){
					array_push($mcqs, $mcq);
				}
			}
		}
		return $mcqs;
	}
}