<?php

namespace AYM\ApiBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class TagType extends AbstractTaxonomyTermType
{
    protected $dataClass = "AYM\ApiBundle\Entity\Tag";
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('parentTag')
        ;
    }
}
