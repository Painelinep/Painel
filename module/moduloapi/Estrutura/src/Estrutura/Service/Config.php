<?php

namespace Estrutura\Service;


class Config {
    private static $config;

    public static function getConfig($indice){
        if(!isset(self::$config[$indice])){
            $config = self::getDados($indice);
            self::$config[$indice] = $config;
        }

        return self::$config[$indice];
    }

    private static function getDados($indice){
        $globals  = require(BASE_PATCH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'autoload'.DIRECTORY_SEPARATOR.'global.php');
        $ambiente = require(BASE_PATCH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'autoload'.DIRECTORY_SEPARATOR.APPLICATION_ENV.'.php');
        $localPath = BASE_PATCH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'autoload'.DIRECTORY_SEPARATOR.'local.php';
        $local = file_exists($localPath) ? require($localPath) : [];

        $configGlobal  = isset($globals[$indice]) ? $globals[$indice] : [];
        $configEnv     = isset($ambiente[$indice]) ? $ambiente[$indice] : [];
        $configLocal   = isset($local[$indice]) ? $local[$indice] : [];

        if (!is_array($configGlobal)) $configGlobal = [];
        if (!is_array($configEnv)) $configEnv = [];
        if (!is_array($configLocal)) $configLocal = [];

        // ordem de prioridade: local > ambiente > global
        return array_merge($configGlobal, $configEnv, $configLocal);
    }
}
