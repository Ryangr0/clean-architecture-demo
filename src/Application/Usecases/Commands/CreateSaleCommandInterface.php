<?php

namespace CleanArchitecture\Application\Usecases\Commands;

interface CreateSaleCommandInterface
{
    public function execute(string $userId, array $products): void;
}
