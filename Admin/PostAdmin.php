<?php

namespace Map2u\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PostAdmin extends Admin {

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
                ->add('body')
                ->add('createdDate')
                ->add('editedDate')
                ->add('isDeleted')
                ->add('deletedDate')
                ->add('unlockedDate')
                ->add('unlockedUntilDate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('id')
                ->add('body')
                ->add('createdDate')
                ->add('editedDate')
                ->add('isDeleted')
                ->add('deletedDate')
                ->add('unlockedDate')
                ->add('unlockedUntilDate')
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
        $formMapper
                ->add('id')
                ->add('body')
                ->add('createdDate')
                ->add('editedDate')
                ->add('isDeleted')
                ->add('deletedDate')
                ->add('unlockedDate')
                ->add('unlockedUntilDate')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('id')
                ->add('body')
                ->add('createdDate')
                ->add('editedDate')
                ->add('isDeleted')
                ->add('deletedDate')
                ->add('unlockedDate')
                ->add('unlockedUntilDate')
        ;
    }

}
