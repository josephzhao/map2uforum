<?php

namespace Map2u\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CategoryAdmin extends Admin {

    private $container = null;

    public function __construct($code, $class, $baseControllerName, $container = null) {
        parent::__construct($code, $class, $baseControllerName);
        $this->container = $container;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id')
                ->add('name')
                ->add('listOrderPriority')
                ->add('readAuthorisedRoles')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('id')
                ->add('name')
                ->add('listOrderPriority')
                ->add('readAuthorisedRoles')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $roles = $this->container->getParameter('security.role_hierarchy.roles');
        $formMapper
                ->with('Category', array('class' => 'col-md-6'))
                ->add('id', 'hidden')
                ->add('forum', 'entity', array('required'=>false,
                    'class' => 'Map2u\ForumBundle\Entity\Forum',
                    'property' => 'name'))
                ->add('name')
                ->add('listOrderPriority')
                ->add('readAuthorisedRoles', 'choice', array('choices' => $roles['ROLE_ADMIN'],
                    'required' => false, 'multiple' => true, 'expanded' => true))
                ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('id')
                ->add('name')
                ->add('listOrderPriority')
                ->add('readAuthorisedRoles')
        ;
    }

}
