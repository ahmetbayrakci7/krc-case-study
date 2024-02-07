<?php

namespace App\Transformers;

use App\Contracts\TransformerInterface;
use Illuminate\Support\Facades\File;

class Vendor3Transformer implements TransformerInterface
{
    private string $vendorName;

    public function __construct(string $vendorName)
    {
        $this->vendorName = $vendorName;
    }

    public function getData(): array
    {
        $xmlData = File::get('./'.$this->vendorName.'.xml');
        $data = simplexml_load_string($xmlData);
        return $this->convertData($data);
    }

    public function convertData($data): array
    {
        $products = [];

        foreach ($data->item as $productNode) {
            $products[] = [
                'vendor' => $this->vendorName,
                'sku' => (int)$productNode->id,
                'name' => (string)$productNode->title,
                'description' => (string)$productNode->description,
                'price' => (float)$productNode->price,
                'category' => (string)$productNode->category,
                'shipping_cost' => (string)$productNode->shipping->cost,
                'shipping_time' => (string)$productNode->shipping->time,
            ];
        }

        return $products;
    }
}
