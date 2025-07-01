<?php

namespace HappyHops\ValuesStorageBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class HappyHopsValuesStorageBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
//        $container->import('../config/config_test.yaml');

        $container->import('../config/services.php');

        $container->parameters()
            ->set('happy_hops_values_storage.default_values', $config['default_values']);
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->import('../config/definition.php');
    }
}
