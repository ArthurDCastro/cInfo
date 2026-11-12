<?php

// A mesma configuração é usada nas páginas e nos endpoints AJAX.
class Database
{
    private static $config;

    private static function config()
    {
        if (self::$config === null) {
            $config = require __DIR__ . '/config.php';
            self::$config = $config['banco'];
        }
        return self::$config;
    }

    public static function manager()
    {
        if (!extension_loaded('mongodb')) {
            throw new RuntimeException('Extensão mongodb ausente. Consulte INSTALACAO.md.');
        }
        return new MongoDB\Driver\Manager(self::config()['uri']);
    }

    public static function collection($name)
    {
        return self::config()['nomeDB'] . '.' . $name;
    }
}
