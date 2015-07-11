<?php

namespace AYM\ApiBundle\Controller;

class LinkController extends BaseController
{
    public function cgetAction()
    {
        $data = array("hello" => "world");
        $view = $this->view($data);
        return $this->handleView($view);
    }
}