<?php

namespace GerFin\Plugins;

use Aura\Router\RouterContainer;
use GerFin\ServiceContainerInterface;

class RoutePlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();
        /* Registrar as rotas da aplicação */
        $map = $routerContainer->getMap();
        /* Tem a função de identificar a rota que estão sendo acessada */
        $matcher = $routerContainer->getMatcher();
        /* Tem a função de gerar links com base nas rotas registradas */
        $generator = $routerContainer->getGenerator();

        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
    }
}
