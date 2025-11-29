<?php

return array(
    'router' => array(
        'routes' => array(
            'gerador-home' => array(
                'type' => 'Zend\Router\Http\Literal',
                'options' => array(
                    'route'    => '/gerador/',
                    'defaults' => array(
                        'controller' => 'gerador',
                        'action'     => 'index',
                    ),
                ),
            ),
            'gerador-seg' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/gerador/:action',
                    'defaults' => array(
                        'controller'    => 'gerador',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            Gerador\Controller\GeradorController::class => Zend\ServiceManager\Factory\InvokableFactory::class
        ),
        'aliases' => array(
            'gerador' => Gerador\Controller\GeradorController::class
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
                'gerador' => array(
                    'type'    => 'simple',       // <- simple route is created by default, we can skip that
                    'options' => array(
                    'route'    => 'play',
                    'defaults' => array(
                        'controller' => 'gerador',
                        'action'     => 'play'
                    )
                  )
                )
            ),
        ),
    ),
);
