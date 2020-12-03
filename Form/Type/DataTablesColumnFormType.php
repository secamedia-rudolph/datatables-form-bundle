<?php

namespace Sm\DatatablesFormBundle\Form\Type;

use Sm\DatatablesFormBundle\Entity\DataTablesColumnForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Thomas Rudolph <rudolph@secamedia.de>
 * @since 1.0
 */
class DataTablesColumnFormType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data')
            ->add('name')
            ->add('searchable')
            ->add('orderable')
            ->add('search', DataTablesSearchFormType::class);
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DataTablesColumnForm::class,
            'csrf_protection' => false
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getBlockPrefix()
    {
        return 'column';
    }
}
