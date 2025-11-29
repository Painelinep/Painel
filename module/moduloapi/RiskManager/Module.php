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
                \Base\View\Helper\CurrentRequest::class => Zend\ServiceManager\Factory\InvokableFactory::class,
                \Base\View\Helper\FormRowNoLabel::class => Zend\ServiceManager\Factory\InvokableFactory::class,
                \Base\View\Helper\RiskManager::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            ),
            'aliases' => array(
                'currentRequest' => \Base\View\Helper\CurrentRequest::class,
                'formRowNoLabel' => \Base\View\Helper\FormRowNoLabel::class,
                'RiskManager' => \Base\View\Helper\RiskManager::class,
            ),
        );
    }
}
