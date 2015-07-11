<?php

namespace AYM\ApiBundle\Controller;

class TagController extends BaseController
{
	protected $entityName = "AYMApiBundle:Tag";
	protected $entityClass = "AYM\ApiBundle\Entity\Tag";
    protected $entityType = "AYM\ApiBundle\Form\TagType";
}