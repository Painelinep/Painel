<?php

return [
    'db' => array(
        'driver' => 'Pdo',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'nomeProjeto' => 'Módulo Risk Manager',
    'general' => [
        'arquivos' => BASE_PATCH . DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'arquivos'.DIRECTORY_SEPARATOR,
    ],
    'VEFIFICA_ACL'=>true,
    'view_helpers' => array(
        'factories' => array(
            \Estrutura\View\Helper\FormataCPFouCNPJ::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Usuario::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Projeto::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Logo::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Data::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\FormInput::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Perfil::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Info::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Estrutura\View\Helper\Acl::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Base\View\Helper\CurrentRequest::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Base\View\Helper\FormRowNoLabel::class => Zend\ServiceManager\Factory\InvokableFactory::class,
            \Base\View\Helper\RiskManager::class => Zend\ServiceManager\Factory\InvokableFactory::class,
        ),
        'aliases' => array(
            'formataCPFouCNPJ' => \Estrutura\View\Helper\FormataCPFouCNPJ::class,
            'Usuario' => \Estrutura\View\Helper\Usuario::class,
            'Projeto' => \Estrutura\View\Helper\Projeto::class,
            'Logo' => \Estrutura\View\Helper\Logo::class,
            'Data' => \Estrutura\View\Helper\Data::class,
            'FormInput' => \Estrutura\View\Helper\FormInput::class,
            'Perfil' => \Estrutura\View\Helper\Perfil::class,
            'Info' => \Estrutura\View\Helper\Info::class,
            'Acl' => \Estrutura\View\Helper\Acl::class,
            'currentRequest' => \Base\View\Helper\CurrentRequest::class,
            'formRowNoLabel' => \Base\View\Helper\FormRowNoLabel::class,
            'RiskManager' => \Base\View\Helper\RiskManager::class,
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Zend\Cache\Storage\Filesystem' => function($sm) {
                $cache = \Zend\Cache\StorageFactory::factory(array(
                    'adapter' => array(
                        'name' => 'filesystem',
                        'options' => array(
                            // tempo de validade do cache
                            'ttl' => 1000, // 5 min
                            // adicionando o diretorio data/cache para salvar os caches.
                            'cacheDir' => './data/cache'
                        ),
                    ),
                    'plugins' => array(
                        'exception_handler' => array('throw_exceptions' => false),
                        'Serializer'
                    )
                ));

                return $cache;
            },
        ),
    ),
    'twitter' => array(
            'oauth_access_token' =>         "2805292805-pezle02XUlxHSPCOzh7fCV5wI8aINBBvK6WTsFs",
            'oauth_access_token_secret' =>  "FkkDSIQ7gNcqIM23FHNnz5R26Y0g6JA1xAZfve57wgLak",
            'consumer_key' => "8nZqYXVBCpKskrZnlQB0caVT4",
            'consumer_secret' => "2DXyRzgCuoZ4AAH0P2xE6ZWLR0NwYwUlxcToqPVMNfXH86TRAd"
    )
];
