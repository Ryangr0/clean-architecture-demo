<?php

namespace CleanArchitecture\Application\Services;

use CleanArchitecture\Domain\Models\Sale;

interface InventoryService
{
    public function saleWasMade(Sale $sale): void;
}
