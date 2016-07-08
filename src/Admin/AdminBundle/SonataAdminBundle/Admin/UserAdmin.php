<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
		'_sort_order' => 'ASC',
		'_sort_by' => 'username'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('username')
			->add('email')
			->add('password')
			->add('roles')
			->add('team', null, array('label' => 'Groupe associe à un utilisateur'))
			->add('mcqs', null, array('label' => 'Questionnaire a associee au groupe'))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('username')
			->add('email')
			->add('password')
			->add('roles')
			->add('team', null, array('label' => 'Groupe'))
			->add('mcqs', null, array('label' => 'Questionnaire(s) associee(s)'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('username')
			->add('email')
			->add('team', null, array('associated_property' => 'name'))
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
			->add('username')
			->add('email')
			->add('password')
			->add('roles')
			->add('team', null, array('associated_property' => 'name'))
			->add('mcqs', null, array('associated_property' => 'name'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
}