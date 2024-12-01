<?php

namespace App\AccountBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class AccountBundleExtension extends Extension
{

    public function prepend(ContainerBuilder $container)
    {
        // Добавляем настройки маппинга Doctrine
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'mappings' => [
                    'AccountBundle' => [
                        'type' => 'annotation',
                        'is_bundle' => false,
                        'dir' => '%kernel.project_dir%/src/AccountBundle/Domain/Model',
                        'prefix' => 'App\AccountBundle\Domain\Model',
                        'alias' => 'AccountBundle',
                    ],
                ],
            ],
        ]);
    }

    public function load(array $configs, ContainerBuilder $container)
    {
    }
}