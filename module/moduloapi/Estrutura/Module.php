<?php
namespace Estrutura;

use Estrutura\Form\AbstractForm;
use Estrutura\Service\AbstractEstruturaService;
use Usuario\Service\Usuario;
use Zend\Db\Adapter\Adapter;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Session\Container;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e)
            {
                $controller = $e->getTarget();
                $controllerClass = get_class($controller);
                $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                $config = $e->getApplication()->getServiceManager()->get('config');
                if (isset($config['module_layouts'][$moduleNamespace])) {
                    $controller->layout($config['module_layouts'][$moduleNamespace]);
                }
            }
            , 100);
    }



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
            'factories' => array (
                'formataCPFouCNPJ' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'Usuario'=> Zend\ServiceManager\Factory\InvokableFactory::class,
                'Projeto'=> Zend\ServiceManager\Factory\InvokableFactory::class,
                'Logo'=> Zend\ServiceManager\Factory\InvokableFactory::class,
                'Data'=> Zend\ServiceManager\Factory\InvokableFactory::class,
                'FormInput' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'Perfil' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'Info' => Zend\ServiceManager\Factory\InvokableFactory::class,
                'Acl' => Zend\ServiceManager\Factory\InvokableFactory::class,
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Usuario' => function($sm){
                        $container = new Container('Usuario');
                        $id = $container->offsetGet('id');
                        if(!$id) return false;

                        $objUsuario = new Usuario();
                        $usuario = $objUsuario->buscar($id);
                        return $usuario;
                    }
            ),
        );
    }
}
