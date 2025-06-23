<?php

namespace BuesingIt\ProjectSettingsBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class BuesingItProjectSettingsBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.php');

        $container->parameters()
            ->set('buesing_it_project_settings.default_values', $config['default_values']);
        ;

        $r=1;

//        $definition = $builder->getDefinition('.buesing_it_project_settings.lurch1');
//
//        if ($config['locale']) {
//            $definition->addArgument($config['locale']);
//        }
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->import('../config/definition.php');
    }
}
