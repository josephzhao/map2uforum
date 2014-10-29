<?php

namespace Map2u\ForumBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TopicAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('cachedViewCount')
            ->add('cachedReplyCount')
            ->add('isClosed')
            ->add('closedDate')
            ->add('isDeleted')
            ->add('deletedDate')
            ->add('isSticky')
            ->add('stickiedDate')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('title')
            ->add('cachedViewCount')
            ->add('cachedReplyCount')
            ->add('isClosed')
            ->add('closedDate')
            ->add('isDeleted')
            ->add('deletedDate')
            ->add('isSticky')
            ->add('stickiedDate')
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
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('id')
            ->add('title')
            ->add('cachedViewCount')
            ->add('cachedReplyCount')
            ->add('isClosed')
            ->add('closedDate')
            ->add('isDeleted')
            ->add('deletedDate')
            ->add('isSticky')
            ->add('stickiedDate')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('cachedViewCount')
            ->add('cachedReplyCount')
            ->add('isClosed')
            ->add('closedDate')
            ->add('isDeleted')
            ->add('deletedDate')
            ->add('isSticky')
            ->add('stickiedDate')
        ;
    }
}
