<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MediaAdmin extends Admin
{
	// setup the default sort column and order
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'name',
			'_sort_by' => 'typeMedia'
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->add('name')
		->add('url')
		->add('typeMedia', null, array('label' => 'type media'))
		;
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('name')
		->add('typeMedia', null, array('label' => 'type media'))
		;
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('name')
		->add('typeMedia', null, array('label' => 'type media'))
		->addIdentifier('url')
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
			->add('url')
			->add('typeMedia', null, array('label' => 'type media'))
			->add('createdAt')
			->add('updatedAt')
		;
	}
}