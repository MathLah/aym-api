<?php

namespace AYM\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class BaseController extends FOSRestController implements ClassResourceInterface
{
    protected $entityName;
    
    public function cgetAction()
    {
        $data = $this
            ->getDoctrine()
            ->getRepository($this->entityName)
            ->findAll();
            
        $view = $this->view($data);
        
        return $this->handleView($view);
    }
}