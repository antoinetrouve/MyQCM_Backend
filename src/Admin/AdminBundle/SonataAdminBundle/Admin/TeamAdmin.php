<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use IIA\WebServiceBundle\Entity\Team;
use Sonata\AdminBundle\Show\ShowMapper;

class TeamAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'ASC',
		'_sort_by' => 'name'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('name')
			->add('mcqs', null, array('label' => 'Questionnaire a associee au groupe'))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('name')
			->add('users', null, array('label' => 'Utilisateur(s) du groupe'))
			->add('mcqs', null, array('label' => 'Questionnaire(s) associee'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('name')
			->add('users', null, array('associated_property' => 'username'))
			->add('mcqs', null, array('associated_property' => 'name'))
			->add('createdAt')
			->add('updatedAt')
			->add('_action', 'actions', array(
					'actions' => array(
						'view' => array(),
						'edit' => array(),
						'delete' => array(),
					)
			))
			;
	}
	
	protected function configureShowFields(ShowMapper $showMapper)
	{
		$showMapper
			->add('name')
			->add('users', null, array('associated_property' => 'username'))
			->add('mcqs', null, array('associated_property' => 'name'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
}