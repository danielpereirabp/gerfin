<?php

namespace GerFin\Plugins;

use GerFin\ServiceContainerInterface;

interface PluginInterface
{
    public function register(ServiceContainerInterface $container);
}
