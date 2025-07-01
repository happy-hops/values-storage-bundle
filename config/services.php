<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use HappyHops\ValuesStorageBundle\EventListener\SchemaListener;
use HappyHops\ValuesStorageBundle\Repository\StoredValueRepository;
use HappyHops\ValuesStorageBundle\Service\ValuesStorageService;
use HappyHops\ValuesStorageBundle\Service\ValuesStorageServiceInterface;

return function (ContainerConfigurator $container): void
{
    $services = $container->services()
        ->defaults()
            ->autowire()
            ->autoconfigure();

    $services
        ->set(StoredValueRepository::class)
        ->private();

    $services
        ->set(SchemaListener::class)
        ->tag('doctrine.event_listener', ['event' => 'postGenerateSchema'])
        ->private();

    $services
        ->set(ValuesStorageService::class)
        ->alias(ValuesStorageServiceInterface::class, ValuesStorageService::class)
        ->public();
};
