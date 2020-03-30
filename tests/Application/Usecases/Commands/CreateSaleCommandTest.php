<?php


use CleanArchitecture\Application\Usecases\Commands\CreateSaleCommand;
use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use PHPUnit\Framework\TestCase;

class CreateSaleCommandTest extends TestCase
{
    /**
     * @var SaleRepository|\Prophecy\Prophecy\ObjectProphecy
     */
    private $saleRepository;
    private CreateSaleCommand $command;

    public function setUp(): void
    {
        $this->saleRepository = $this->prophesize(SaleRepository::class);
        $this->command = new CreateSaleCommand($this->saleRepository->reveal());
    }

    public function test_is_instantiable()
    {
        $this->assertInstanceOf(CreateSaleCommand::class, $this->command);
    }
}
