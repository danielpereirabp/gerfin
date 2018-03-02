<?php
declare(strict_types=1);
namespace GerFin\Plugins;

use GerFin\ServiceContainerInterface;
use Interop\Container\ContainerInterface;

class RoutePlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new \Twig_Enviroment($loader);
            return $twig;
        });
    }
}
