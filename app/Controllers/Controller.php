<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller 
{
    protected $container;
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = $container->get('db');
    }
}