<?php

namespace Intervention\Image\Symfony\DependencyInjection;

use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('intervention_image');
        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('driver')
                    ->defaultValue(GdDriver::class)
                ->end()
                ->arrayNode('options')->addDefaultsIfNotSet()
                    ->children()
                        ->booleanNode('autoOrientation')->defaultValue(true)->end()
                        ->booleanNode('decodeAnimation')->defaultValue(true)->end()
                        ->scalarNode('blendingColor')->defaultValue('ffffff')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
