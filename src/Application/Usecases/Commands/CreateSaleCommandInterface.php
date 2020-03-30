<?php

namespace CleanArchitecture\Application\Usecases\Commands;

interface CreateSaleCommandInterface
{
    public function execute(string $customerId, array $products): void;
}
