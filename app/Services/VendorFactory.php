<?php
namespace App\Services;

use App\Contracts\TransformerInterface;
use App\Transformers\Vendor1Transformer;
use App\Transformers\Vendor2Transformer;
use App\Transformers\Vendor3Transformer;
use InvalidArgumentException;

class VendorFactory
{
    public function vendors(string $vendorName): TransformerInterface
    {
        return match ($vendorName) {
            'vendor1' => new Vendor1Transformer($vendorName),
            'vendor2' => new Vendor2Transformer($vendorName),
            'vendor3' => new Vendor3Transformer($vendorName),
            default => throw new InvalidArgumentException('Invalid vendor name'),
        };
    }
}
