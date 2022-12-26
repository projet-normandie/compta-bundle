<?php

namespace ProjetNormandie\ComptaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Route\RouteCollectionInterface;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Administration manager for the Compta Bundle.
 */
class ComptaAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'pncomptabundle_admin_compta';

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollectionInterface $collection): void
    {
        $collection
            ->remove('show')
            ->remove('export')
            ->remove('delete');
    }

    /**
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('id', TextType::class, ['label' => 'label.id', 'attr' => ['readonly' => true]])
            ->add('month', TextType::class, ['label' => 'label.month'])
            ->add('source', null, ['label' => 'label.source'])
            ->add('type', null, ['label' => 'label.type'])
            ->add('value', null, ['label' => 'label.value']);
    }

    /**
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('source', null, ['label' => 'label.source'])
            ->add('type', null, ['label' => 'label.type'])
            ->add('month', null, ['label' => 'label.month']);
    }

    /**
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', null, ['label' => 'label.id'])
            ->add('month', null, ['label' => 'label.month'])
            ->add('source', null, ['label' => 'label.source'])
            ->add('type', null, ['label' => 'label.type'])
            ->add('value', null, ['label' => 'label.value'])
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                ]
            ]);
    }

    /**
     * @param ShowMapper $show
     */
    protected function configureShowFields(ShowMapper $show): void
    {
        $show
            ->add('id', null, ['label' => 'label.id'])
            ->add('month', null, ['label' => 'label.month'])
            ->add('source', null, ['label' => 'label.source'])
            ->add('type', null, ['label' => 'label.type']);
    }
}
