<?php

namespace CleanArchitecture\Application\Usecases\Commands;

use CleanArchitecture\Application\Services\InventoryService;
use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Sale;
use Ramsey\Uuid\Uuid;

class CreateSaleCommand implements CreateSaleCommandInterface
{
    private SaleRepository $saleRepository;
    private InventoryService $inventoryService;

    public function __construct(SaleRepository $saleRepository, InventoryService $inventoryService)
    {
        $this->saleRepository = $saleRepository;
        $this->inventoryService = $inventoryService;
    }

    public function execute(string $customerId, array $products): void
    {
        $sale = new Sale(Uuid::uuid4(), $customerId, $products);
        $this->saleRepository->save($sale);
        $this->inventoryService->saleWasMade($sale);
    }
}
