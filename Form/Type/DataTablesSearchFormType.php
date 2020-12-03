<?php

namespace Sm\DatatablesFormBundle\Form\Type;

use Sm\DatatablesFormBundle\Entity\DataTablesSearchForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form type for search value in datatables ajax request data.
 *
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesSearchFormType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('regex')
            ->add('value');
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DataTablesSearchForm::class,
            'csrf_protection' => false
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'search';
    }
}
