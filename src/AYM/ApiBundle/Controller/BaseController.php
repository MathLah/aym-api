<?php

namespace AYM\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends FOSRestController implements ClassResourceInterface
{
    protected $entityName;
    protected $entityClass;
    protected $entityType;
    
    public function cgetAction()
    {
        $data = $this
            ->getDoctrine()
            ->getRepository($this->entityName)
            ->findAll();
            
        $view = $this->view($data);
        
        return $this->handleView($view);
    }
    
    public function getAction($id)
    {
        $data = $this
            ->getDoctrine()
            ->getRepository($this->entityName)
            ->find($id);
            
        if (! $data) {
            throw $this->createNotFoundException('Unable to find link.');
        }
            
        $view = $this->view($data);
        
        return $this->handleView($view);
    }
    
    public function postAction(Request $request)
    {
        $entityClass = $this->entityClass;
        $entity = new $entityClass();
        
        $entityType = $this->entityType;
        
        $form = $this->createForm(new $entityType(), $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $view = $this->view(array('status' => 'OK', 'data' => $entity));
            
            return $this->handleView($view);
        }

        return $this->handleView($this->view($form, Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}