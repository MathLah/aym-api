<?php

namespace AYM\ApiBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;

class LinkType extends BaseEntityType
{
    protected $dataClass = "AYM\ApiBundle\Entity\LinkType";
    
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('url')
        ;
    }
}
