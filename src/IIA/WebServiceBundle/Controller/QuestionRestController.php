<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\Question;
use IIA\WebServiceBundle\Entity\Mcq;

class QuestionRestController extends Controller
{
	public function getQuestionAction($id){
		$question = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Question')->findOneById($id);
		if(!is_object($question)){
			throw $this->createNotFoundException();
		}
		return $question;
	}
	
	public function getQuestionsAction(){
		$questions = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Question')->findAll();
		return $questions;
	}
}