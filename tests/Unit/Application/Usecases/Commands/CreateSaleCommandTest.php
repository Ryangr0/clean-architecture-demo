<?php

namespace CleanArchitecture\Tests\Unit\Application\Usecases\Commands;

use CleanArchitecture\Application\Services\InventoryService;
use CleanArchitecture\Application\Usecases\Commands\CreateSaleCommand;
use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Product;
use CleanArchitecture\Domain\Models\Sale;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;

class CreateSaleCommandTest extends TestCase
{
    private CreateSaleCommand $command;
    private string $customerId;

    /**
     * @var SaleRepository|\Prophecy\Prophecy\ObjectProphecy
     */
    private $saleRepository;
    /**
     * @var InventoryService|\Prophecy\Prophecy\ObjectProphecy
     */
    private $inventoryService;
    /**
     * @var Product|\Prophecy\Prophecy\ObjectProphecy
     */
    private $product;

    public function setUp(): void
    {
        $this->saleRepository = $this->prophesize(SaleRepository::class);
        $this->inventoryService = $this->prophesize(InventoryService::class);
        $this->command = new CreateSaleCommand($this->saleRepository->reveal(), $this->inventoryService->reveal());

        $this->customerId = Uuid::uuid4();
        $this->product = $this->prophesize(Product::class);
        $this->product->amountInCents()->willReturn(599);
    }

    public function test_command_will_save_to_repository()
    {
        $this->saleRepository->save(Argument::type(Sale::class))->shouldBeCalledOnce();

        $this->command->execute($this->customerId, [$this->product->reveal()]);
    }

    public function test_command_will_notify_the_inventory_service_after_saving()
    {
        $this->inventoryService->saleWasMade(Argument::type(Sale::class))->shouldBeCalledOnce();

        $this->command->execute($this->customerId, [$this->product->reveal()]);
    }
}
