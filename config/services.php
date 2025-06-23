<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use BuesingIt\ProjectSettingsBundle\EventListener\SchemaListener;
use BuesingIt\ProjectSettingsBundle\Service\DbManager;
use BuesingIt\ProjectSettingsBundle\Service\DbManagerInterface;
use BuesingIt\ProjectSettingsBundle\Service\ProjectSettingsService;
use BuesingIt\ProjectSettingsBundle\Service\ProjectSettingsServiceInterface;

return function (ContainerConfigurator $container) {
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    $services
        ->set(DbManager::class)
        ->alias(DbManagerInterface::class, DbManager::class);

    $services
        ->set(SchemaListener::class)
        ->tag('doctrine.event_listener', ['event' => 'postGenerateSchema']);

    $services
        ->set(ProjectSettingsService::class)
        ->alias(ProjectSettingsServiceInterface::class, ProjectSettingsService::class)
        ->public();
};
