<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller 
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->validator = $this->container->validator;
    }
}