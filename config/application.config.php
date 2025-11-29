<?php

return array(
    'modules' => array(
        'Zend\Router',
        'Zend\Validator',
        'Zend\I18n',
        'Zend\Mvc\I18n',
        'Zend\Form',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Navigation',
        'Zend\Paginator',
        'ModuloApi',
        'Application',
        'Dashboard',
        'Autenticacao',
        'Usuario',
        'Estrutura',
        'Gerador',
        'Modulo',
        'RiskManager',
        'Base',
        'Mobile',
        'Classes',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './module/ModuloApi',
            './vendor',
        ),
        'config_glob_paths' => array(
            'config/autoload/global.php',
        ),
    ),
);
