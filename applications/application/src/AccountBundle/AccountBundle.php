<?php

namespace App\AccountBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AccountBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        // Добавьте ваше расширение
        $extension = new AccountBundleExtension();
        $container->registerExtension($extension);
    }
}