<?php

namespace AYM\ApiBundle\Controller;

class LinkController extends BaseController
{
	protected $entityName = "AYMApiBundle:Link";
	protected $entityClass = "AYM\ApiBundle\Entity\Link";
    protected $entityType = "AYM\ApiBundle\Form\LinkType";
}