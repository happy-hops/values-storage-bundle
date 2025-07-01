<?php

namespace HappyHops\ValuesStorageBundle\EventListener;

use HappyHops\ValuesStorageBundle\Repository\StoredValueRepository;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Symfony\Bridge\Doctrine\SchemaListener\AbstractSchemaListener;

class SchemaListener extends AbstractSchemaListener
{
    public function __construct(
        private readonly StoredValueRepository $storedValueRepo,
    )
    {}

    public function postGenerateSchema(GenerateSchemaEventArgs $event): void
    {
        $this->storedValueRepo->configureSchema($event->getSchema());
    }
}
