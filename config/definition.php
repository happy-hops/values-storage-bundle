<?php

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $definition): void
{
    /** @phpstan-ignore method.notFound */
    $definition->rootNode()
        ->children()
            ->arrayNode('default_values')
                ->ignoreExtraKeys(false)
                ->variablePrototype()->end()
            ->end()
        ->end()
    ;
};