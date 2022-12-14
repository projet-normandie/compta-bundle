<?php

namespace ProjetNormandie\ComptaBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;
use Sonata\AdminBundle\Route\RouteCollectionInterface;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sonata\AdminBundle\Form\Type\ModelListType;

/**
 * Administration manager for the Compta Bundle.
 */
class DonationAdmin extends AbstractAdmin
{
    protected $baseRouteName = 'pncomptabundle_admin_donation';

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
            ->add('user', ModelListType::class, [
                'btn_add' => false,
                'btn_list' => true,
                'btn_edit' => false,
                'btn_delete' => true,
                'btn_catalogue' => true,
                'label' => 'label.user',
            ])
            ->add('value', null, ['label' => 'label.value'])
            ->add('dateDonation', DateType::class, [
                'label' => 'label.donatedAt',
                'required' => true,
                'years' => range(2004, date('Y'))
            ]);
    }

    /**
     * @param DatagridMapper $filter
     */
    protected function configureDatagridFilters(DatagridMapper $filter): void
    {
        $filter
            ->add('user', ModelFilter::class, [
                'label' => 'label.user',
                'field_type' => ModelAutocompleteType::class,
                'field_options' => ['property' => 'username'],
            ]);
    }

    /**
     * @param ListMapper $list
     */
    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id', null, ['label' => 'label.id'])
            ->add('user', null, ['label' => 'label.user'])
            ->add('dateDonation', 'datetime', ['label' => 'label.donatedAt'])
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
            ->add('dateDonation', 'datetime', ['label' => 'label.donatedAt'])
            ->add('value', null, ['label' => 'label.value']);
    }
}
