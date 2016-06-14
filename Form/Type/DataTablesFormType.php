<?php

namespace Sm\DatatablesFormBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Root form type for datatables ajax request data.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('draw')
            ->add('start')
            ->add('length')
            ->add('order', CollectionType::class, [
                'allow_add' => true,
                'entry_type' => DataTablesOrderFormType::class
            ])
            ->add('columns', CollectionType::class, [
                'allow_add' => true,
                'entry_type' => DataTablesColumnFormType::class
            ])
            ->add('search', DataTablesSearchFormType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Sm\DatatablesFormBundle\Entity\DataTablesForm',
            'csrf_protection' => false,
            'validation_groups' => false
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'datatables';
    }
}
