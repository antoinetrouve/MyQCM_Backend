<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\Answer;
use IIA\WebServiceBundle\Entity\Question;
use IIA\WebServiceBundle\Entity\Result;
use IIA\WebServiceBundle\EntityJson\ResultJson;
use IIA\WebServiceBundle\Entity\User;
use JMS\Serializer\Annotation;
use JMS\Serializer\SerializerBuilder;
use IIA\WebServiceBundle\Entity\Mcq;

class ResultRestController extends Controller
{
	/**
	 * Get json flow Result
	 * @return serializer jsonData
	 */
	public function getResultAction()
	{
		$resultJson = new  ResultJson();
		$serializerBuilder = new  SerializerBuilder();
		$serializer = $serializerBuilder::create()->build();

		//Create result flow for test
		$resultJson->setId(1);
		$resultJson->setIdMcq(8);
		$resultJson->setIdUser(1);
		$resultJson->addListIdAnswer(6);
		$jsonData =  $serializer->serialize($resultJson,'json');
		
		$this->postResultAction($jsonData);

		return $jsonData;
	}

	public function postResultAction($jsonData){
		$result = new Result();
		$user = new  User();
		$mcq = new  Mcq();
		$serializerBuilder = new  SerializerBuilder();
		$score = 0;

		//Get Result json Flow
		$serializer = $serializerBuilder::create()->build();
		$resultJson = $serializer->deserialize($jsonData, 'IIA\WebServiceBundle\EntityJson\ResultJson', 'json');

		/*Get Entities with Json flow*/
		//Get user
		$idUser = $resultJson->getIdUser();
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByid($idUser);

		//Get mcq
		$idMcq = $resultJson->getIdMcq();
		$mcq = $this->getDoctrine()->getRepository('IIAWebServiceBundle:MCQ')->findOneByid($idMcq);

		//Get answer's list
		$listIdAnswers = $resultJson->getListIdAnswer();
		
		//get Question MCQ
		$listQuestions = $mcq->getQuestions();
		
		//for each question into Questions list
		foreach ($listQuestions as $question)
		{
			//List of valid or wrong answer
			$listAnswersValid =  Array();
			$listAnswersWrong =  Array();
			//counter to know how much user's answer isValid or not
			$countAnswerValid = 0;
			$countAnswerFalse = 0;
			
			//Get question's answer valid and wrong of Mcq
			foreach ($question->getAnswers() as $answer)
			{
				if($answer->getIsValid() == 1)
				{
					array_push($listAnswersValid, $answer->getId());
				}else
				{
					array_push($listAnswersWrong, $answer->getId());
				}
			}
			//print_r(count($listAnswersValid));

			//Calc how much true answer
			foreach ($listAnswersValid as $answerValid)
			{
				foreach ($listIdAnswers as $idAnswer)
				{
					if($answerValid == $idAnswer)
					{
						$countAnswerValid = $countAnswerValid + 1;
					}
				}
			}

			//Calc how much wrong answer
			foreach ($listAnswersWrong as $answerWrong)
			{
				foreach ($listIdAnswers as $idAnswer)
				{
					if($answerWrong == $idAnswer)
					{
						$countAnswerFalse = $countAnswerFalse + 1;
					}
				}
			}

			//Calc score fo one question
			if($countAnswerValid == count($listAnswersValid) && $countAnswerFalse == 0)
			{
				$score =$score +1 ;
			}
		}
		print_r($score);
		return $resultJson;
	}
	
	/**
	 * 
	 * @param json $jsonData
	 */
	public function deserializeJMS($jsonData) {}
}
