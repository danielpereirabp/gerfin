<?php
declare(strict_types=1);
namespace GerFin;

use GerFin\Plugins\PluginInterface;

class Application
{
    private $serviceContainer;

    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service(string $name)
    {
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service): void
    {
        if (\is_callable($service)) {
            $this->serviceContainer->addLazy($name, $service);
        } else {
            $this->serviceContainer->add($name, $service);
        }
    }

    public function plugin(PluginInterface $plugin)
    {
        $plugin->register($this->serviceContainer);
    }
}
