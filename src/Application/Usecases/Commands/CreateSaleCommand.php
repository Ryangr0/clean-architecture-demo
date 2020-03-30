<?php

namespace CleanArchitecture\Application\Usecases\Commands;

use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Sale;

class CreateSaleCommand implements CreateSaleCommandInterface
{
    /**
     * @var SaleRepository
     */
    private SaleRepository $saleRepository;

    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function execute(string $customerId, array $products): void
    {
        $sale = new Sale($customerId, $products);
        $this->saleRepository->save($sale);
    }
}
