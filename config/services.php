<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use MatBuesing\ValuesStorageBundle\EventListener\SchemaListener;
use MatBuesing\ValuesStorageBundle\Service\DbManager;
use MatBuesing\ValuesStorageBundle\Service\DbManagerInterface;
use MatBuesing\ValuesStorageBundle\Service\ProjectSettingsService;
use MatBuesing\ValuesStorageBundle\Service\ProjectSettingsServiceInterface;

return function (ContainerConfigurator $container) {
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    $services
        ->set(DbManager::class)
        ->alias(DbManagerInterface::class, DbManager::class)
        ->private();

    $services
        ->set(SchemaListener::class)
        ->tag('doctrine.event_listener', ['event' => 'postGenerateSchema'])
        ->private();

    $services
        ->set(ProjectSettingsService::class)
        ->alias(ProjectSettingsServiceInterface::class, ProjectSettingsService::class)
        ->public();
};
