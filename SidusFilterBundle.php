<?php

namespace Sidus\FilterBundle;

use Sidus\FilterBundle\DependencyInjection\Compiler\FilterTypeCompilerPass;
use Sidus\FilterBundle\DependencyInjection\Compiler\GenericCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class SidusFilterBundle
 *
 * @package Sidus\FilterBundle
 */
class SidusFilterBundle extends Bundle
{
    /**
     * Adding compiler passes to inject services into configuration handlers
     *
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(
            new GenericCompilerPass(
                'sidus_filter.registry.filter_type',
                'sidus.filter_type',
                'addFilterType'
            )
        );
        $container->addCompilerPass(
            new GenericCompilerPass(
                'sidus_filter.factory.query_handler_configuration',
                'sidus.filter_factory',
                'addFilterFactory'
            )
        );
    }
}
