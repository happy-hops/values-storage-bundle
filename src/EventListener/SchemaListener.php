<?php

namespace BuesingIt\ProjectSettingsBundle\EventListener;

use BuesingIt\ProjectSettingsBundle\Service\DbManager;
use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;
use Symfony\Bridge\Doctrine\SchemaListener\AbstractSchemaListener;

class SchemaListener extends AbstractSchemaListener
{
    public function __construct(
        private readonly DbManager $dbManager,
    )
    {}

    public function postGenerateSchema(GenerateSchemaEventArgs $event): void
    {
        $this->dbManager->configureSchema($event->getSchema());
    }
}
