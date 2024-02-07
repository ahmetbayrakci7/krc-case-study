<?php

namespace App\Contracts;
interface TransformerInterface
{
    public function getData(): array;
    public function convertData($data): array;
}
