<?php

namespace Application\Hydrator;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Interop\Container\ContainerInterface;

class CollectionExtractFactory
{
    public function __invoke(ContainerInterface $container, $requestedName)
    {
        $dependency = $container->get('HydratorManager')->get(DoctrineObject::class);
        return new CollectionExtract($dependency);
    }
}