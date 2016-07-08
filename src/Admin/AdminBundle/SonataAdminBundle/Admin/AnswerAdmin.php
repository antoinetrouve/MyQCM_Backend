<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class AnswerAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'value'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
			->add('value')
			->add('isValid')
			->add('question', null, array('label' => 'Question'))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
			->add('value')
			->add('isValid')
			->add('question', null, array('label' => 'Question associee'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('value')
			->add('isValid')
			->add('question', null, array('label' => 'Question'))
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
			->add('value')
			->add('isValid')
			->add('question', null, array('label' => 'Question'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
}