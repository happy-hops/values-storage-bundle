<?php

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $definition): void {
    $definition->rootNode()
        ->children()
            ->arrayNode('default_values')
                ->ignoreExtraKeys(false)
                ->variablePrototype()->end()
            ->end()
        ->end()
    ;
};
