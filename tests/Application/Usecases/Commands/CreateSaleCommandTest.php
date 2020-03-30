<?php


use CleanArchitecture\Application\Usecases\Commands\CreateSaleCommand;
use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Product;
use CleanArchitecture\Domain\Models\Sale;
use PHPUnit\Framework\TestCase;

class CreateSaleCommandTest extends TestCase
{
    private CreateSaleCommand $command;
    private string $customerId;

    /**
     * @var SaleRepository|\Prophecy\Prophecy\ObjectProphecy
     */
    private $saleRepository;
    /**
     * @var Product|\Prophecy\Prophecy\ObjectProphecy
     */
    private $product;

    public function setUp(): void
    {
        $this->saleRepository = $this->prophesize(SaleRepository::class);
        $this->command = new CreateSaleCommand($this->saleRepository->reveal());

        $this->customerId = 'customerId';
        $this->product = $this->prophesize(Product::class);
        $this->product->amountInCents()->willReturn(599);
    }

    public function test_command_will_save_on_happy_flow()
    {
        $expectedSaleToBeSaved = new Sale($this->customerId, [$this->product->reveal()]);
        $this->saleRepository->save($expectedSaleToBeSaved)->shouldBeCalledOnce();

        $this->command->execute($this->customerId, [$this->product->reveal()]);
    }
}
