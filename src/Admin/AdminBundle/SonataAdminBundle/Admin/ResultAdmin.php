<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ResultAdmin extends Admin
{
	//score, isCompleted, createdAt, updatedAt, user, mcq
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'score'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('score')
			->add('user', null, array('label' => 'Utilisateur associe'))
			->add('mcq', null, array('label' => 'Questionnaire associee'))
			->add('isCompleted', null, array('label' => 'Complete ou non'))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('score')
			->add('user', null, array('label' => 'Utilisateur'))
			->add('mcq', null, array('label' => 'Questionnaire'))
			->add('isCompleted', null, array('label' => 'Complete ou non'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->add('score')
			->addIdentifier('user', null, array('associated_property' => 'username'))
			->addIdentifier('mcq', null, array('associated_property' => 'name'))
			->add('isCompleted')
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
			->add('score')
			->add('user', null, array('associated_property' => 'username'))
			->add('mcq', null, array('associated_property' => 'name'))
			->add('isCompleted')
			->add('createdAt')
			->add('updatedAt')
		;
	}
}