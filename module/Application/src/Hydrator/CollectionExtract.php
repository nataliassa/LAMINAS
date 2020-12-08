<?php

namespace Application\Hydrator;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Laminas\Hydrator\Strategy\StrategyInterface;
use DoctrineModule\Stdlib\Hydrator\Strategy\AbstractCollectionStrategy;

class CollectionExtract extends AbstractCollectionStrategy implements StrategyInterface
{

    private $doctrineObject;

    public function __construct(DoctrineObject $doctrineObject)
    {
        $this->doctrineObject = $doctrineObject;
    }
    
    public function extract($value)
    {
        $data = $value->getValues();
        $result = [];
        foreach($data as $row){
            $result[] = $this->doctrineObject->extract($row);
        }
        return $result;
    }

    public function hydrate($value)
    {
        // This strategy does note support hydration of collections.
    }
}
