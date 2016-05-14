<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IIA\WebServiceBundle\Controller\McqRestController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\User;
use IIA\WebServiceBundle\Entity\Team;
use IIA\WebServiceBundle\Entity\Mcq;
use IIA\WebServiceBundle\Entity\Category;

class CategoryRestController extends Controller
{
	public function getCategoryAction($name){
		$category = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Category')->findOneByname($name);
		if(!is_object($category)){
			throw $this->createNotFoundException();
		}
		return $category;
	}
	
	public function getCategoryIdAction($id){
		$category = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Category')->findOneByid($id);
		if(!is_object($category)){
			throw $this->createNotFoundException();
		}
		return $category;
	}

	
	public function getCategoriesAction(){
		$categories = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Category')->findAll();
		return $categories;
	}
	
	public function getCategoriesuserAction($userId){
		$categories = array();
		$mcqs = array();
		$tempMcqs = array();
		$team = new Team();
		// Jeoff = $teamUser = array();
	
		// get User by id 
		$user = $this->getDoctrine()->getRepository('IIAWebServiceBundle:User')->findOneByid($userId);
		//get User Team
		$team = $user->getTeam();
		
		if ($team != null)
		{
			$tempMcqs = self::getMcqList($team,$user);
		}
		else 
		{
			//Get Mcq's user
			foreach ($user->getMcqs() as $mcq){
				array_push($tempMcqs, $mcq);
			}
		}
		
		if($tempMcqs != null)
		{
			$categories = self::getCategoryList($tempMcqs);
		}
		
		return $categories;
	}
	
	private function getMcqList($team,$user)
	{
		$tempMcqs = array();
		$teamMcqs = array();
		$userMcqs = array();
		$diff = array();
		$temp = array();

		//Get Mcq's id in team's user
		foreach ($team->getMcqs() as $mcq)
		{
			//Insert Mcq's id in team's user in array
			array_push($teamMcqs, $mcq->getId());
		}
		
		//Get Mcq's id in team's user
		foreach ($user->getMcqs() as $mcq){
			array_push($userMcqs, $mcq->getId());
		}
		
			
		//Return list id mcqs for the User
		$temp = array_merge($userMcqs,$teamMcqs);
		$diff = array_unique($temp);
			
		//Add mcq in tempo list
		foreach ($diff as $mcq_id){
			$tempMcq = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Mcq')->findOneById($mcq_id);
			array_push($tempMcqs, $tempMcq);
		}
		
		return $tempMcqs;
	}
	
	private function getCategoryList($mcqs)
	{
		$categories = array();
		$tempCategoryIds = array();
		$diff = array();
		
		if($mcqs != null)
		{
			foreach ($mcqs as $mcq)
			{
				array_push($tempCategoryIds, $mcq->getCategory()->getId());
			}
			
			$diff = array_unique($tempCategoryIds);
			
			foreach ($diff as $categ_id){
				$tempCateg = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Category')->findOneById($categ_id);
				array_push($categories, $tempCateg);
			}
		}
		return $categories;
	}
}