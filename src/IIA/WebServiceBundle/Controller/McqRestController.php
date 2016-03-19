<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Mcq;

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
}