<?php

namespace Sm\DatatablesFormBundle\Form\Type;

use Sm\DatatablesFormBundle\Entity\DataTablesOrderForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form type for order definition.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesOrderFormType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('column')
            ->add('dir');
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DataTablesOrderForm::class,
            'csrf_protection' => false
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'order';
    }
}
