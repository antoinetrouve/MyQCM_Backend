<?php
namespace IIA\WebServiceBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use IIA\WebServiceBundle\Entity\User;
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
	
	public function getCategoriesAction(){
		$categories = $this->getDoctrine()->getRepository('IIAWebServiceBundle:Category')->findAll();
		return $categories;
	}
}