<?php
namespace Admin\AdminBundle\SonataAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class McqAdmin extends Admin
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
            ->add('isActif')
            ->add('countdown')
            ->add('category', null, array('label' => 'Categorie'))
            ->add('diffDeb')
            ->add('diffEnd')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('isActif')
            ->add('countdown')
            ->add('questions', null, array('label' => 'Question associee'))
            ->add('category', null, array('label' => 'Categorie associe'))
            ->add('diffDeb')
            ->add('diffEnd')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('isActif')
            ->add('countdown')
            ->add('questions', null, array('associated_property' => 'name'))
            ->add('category', null, array('label' => 'Categorie'))
            ->add('diffDeb')
            ->add('diffEnd')
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
            ->add('isActif')
            ->add('countdown')
            ->add('questions', null, array('associated_property' => 'name'))
            ->add('category', null, array('label' => 'Categorie'))
            ->add('diffDeb')
            ->add('diffEnd')
            ->add('createdAt')
            ->add('updatedAt')
    	;
    }
}