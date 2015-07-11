<?php

namespace AYM\ApiBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

abstract class AbstractTaxonomyTermType extends BaseEntityType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('title')
        ;
    }
}
