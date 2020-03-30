<?php

namespace CleanArchitecture\Application\Usecases\Repositories;

use CleanArchitecture\Domain\Models\Sale;

interface SaleRepository
{
    public function save(Sale $sale);
}
