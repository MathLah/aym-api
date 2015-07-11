<?php

namespace AYM\ApiBundle\Controller;

class CategoryController extends BaseController
{
	protected $entityName = "AYMApiBundle:Category";
	protected $entityClass = "AYM\ApiBundle\Entity\Category";
    protected $entityType = "AYM\ApiBundle\Form\CategoryType";
}