<?php
// module/Mobile/config/module.config.php

namespace Mobile;

return array(
    'router' => array(
        'routes' => array(
            'mobile' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mobile[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Mobile\Controller\Index',
                        'action'     => 'cadastro-ocorrencia',
                    ),
                ),
            ),
            // ROTA ADICIONAL PARA A BUSCA DE COORDENAÇÕES
            'mobile-get-coordenacao' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/mobile/get-coordenacao',
                    'defaults' => array(
                        'controller' => 'Mobile\Controller\Index',
                        'action'     => 'getCoordenacao',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            Mobile\Controller\IndexController::class => Zend\ServiceManager\Factory\InvokableFactory::class,
        ),
        'aliases' => array(
            'Mobile\Controller\Index' => Mobile\Controller\IndexController::class,
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/mobile'           => __DIR__ . '/../view/layout/mobile.phtml',
        ),
    ),
);
