<?php
namespace RiskManager;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'currentRequest' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'formRowNoLabel' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'RiskManager' => Zend\ServiceManager\Factory\InvokableFactory::class,
            ),
        );
    }
}
