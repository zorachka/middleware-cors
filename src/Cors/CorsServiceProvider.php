<?php

declare(strict_types=1);

namespace Zorachka\Framework\Cors;

use Psr\Container\ContainerInterface;
use Zorachka\Framework\Container\ServiceProvider;

final class CorsServiceProvider implements ServiceProvider
{
    /**
     * @inheritDoc
     */
    public static function getDefinitions(): array
    {
        return [
            CorsMiddleware::class => static function(ContainerInterface $container) {
                /** @var CorsConfig $config */
                $config = $container->get(CorsConfig::class);

                return new CorsMiddleware($config);
            },
            CorsConfig::class => static fn() => CorsConfig::withDefaults(),
        ];
    }

    /**
     * @inheritDoc
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
