<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller 
{
    protected $container;
    protected $db;
    protected $validator;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = $container->get('db');
        $this->validator = $this->container->validator;
    }
}