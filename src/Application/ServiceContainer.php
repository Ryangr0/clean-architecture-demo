<?php

namespace CleanArchitecture\Application;

use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Infrastructure\Persistence\Repositories\MysqlSaleRepository;
use League\Container\Container;
use Medoo\Medoo;

class ServiceContainer
{
    private static Container $container;

    private function __construct()
    {
    }

    private static function getInstance()
    {
        if (!isset(self::$container)) {
            self::$container = new Container();
            self::registerBindings();
        }

        return self::$container;
    }

    public static function make(string $class)
    {
        return self::getInstance()->get($class);
    }

    private static function registerBindings()
    {
        self::$container->add(SaleRepository::class, MysqlSaleRepository::class)->addArgument(Medoo::class);
        self::$container->add(
            Medoo::class,
            function () {
                return new Medoo([
                    'database_type' => 'mysql',
                    'database_name' => 'clean_architecture',
                    'server' => 'database',
                    'username' => 'root',
                    'password' => 'test'
                ]);
            },
            true
        );
    }
}
