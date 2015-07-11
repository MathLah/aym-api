<?php

namespace AYM\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController extends FOSRestController implements ClassResourceInterface
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
        $entity = $this->findEntity($id);
            
        $view = $this->view($entity);
        
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
    
    public function putAction($id, Request $request)
    {
        $entity = $this->findEntity($id);

        $entityType = $this->entityType;
        $form = $this->createForm(new $entityType(), $entity, array('method' => 'PUT'));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->handleView($this->view(array('status' => 'OK', 'data' => $entity)));
        }

        return $this->handleView($this->view($form, Response::HTTP_UNPROCESSABLE_ENTITY));
    }
    
    public function deleteAction($id)
    {
        $entity = $this->findEntity($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        $response = new Response();
        $response->setStatusCode(Response::HTTP_NO_CONTENT);

        return $response;
    }

    protected function findEntity($id)
    {
         $item = $this
            ->getDoctrine()
            ->getRepository($this->entityClass)
            ->find($id);

        if (! $item) {
            throw $this->createNotFoundException($this->entityClass + ' not found.');
        }

        return $item;
    }
}