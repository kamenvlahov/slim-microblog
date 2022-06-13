<?php
namespace App\Repository;

use Psr\Container\ContainerInterface;

class Repository 
{
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}