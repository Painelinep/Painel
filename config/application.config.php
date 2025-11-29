<?php

return array(
    'modules' => array(
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
