<?php


use CleanArchitecture\Application\Usecases\Commands\CreateSaleCommand;
use PHPUnit\Framework\TestCase;

class CreateSaleCommandTest extends TestCase
{
    public function test_is_instantiable()
    {
        $this->assertInstanceOf(CreateSaleCommand::class, new CreateSaleCommand());
    }
}
