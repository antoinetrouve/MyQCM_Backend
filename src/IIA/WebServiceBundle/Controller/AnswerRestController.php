<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\Answer;
use IIA\WebServiceBundle\Entity\Question;

class AnswerRestController extends Controller
{
	/**
	 * Get list of question's answer
	 * @param integer $question_id
	 */
	public function getAnswersquestionAction($question_id){
		$answers = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Answer')->findByQuestion($question_id);
		return $answers;
	}
	
	/**
	 * Get all answers
	 */
	public function getAnswersAction(){
		$answers = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Answer')->findAll();
		return $answers;
	}
}