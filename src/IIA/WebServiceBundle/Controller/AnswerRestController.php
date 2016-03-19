<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\Answer;
use IIA\WebServiceBundle\Entity\Question;

class AnswerRestController extends Controller
{
	public function getAnswerAction($question_id){
		 $question = new Question();
		 $question = 
		$answers = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Answer')->findByQuestion_id($question_id);

		return $answers;
	}
	
	public function getAnswersAction(){
		$answers = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Answer')->findAll();
		return $answers;
	}
}