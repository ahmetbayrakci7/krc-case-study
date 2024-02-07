<?php
namespace App\Transformers;

use App\Contracts\TransformerInterface;
use Illuminate\Support\Facades\File;

class Vendor1Transformer implements TransformerInterface
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

        foreach ($data->product as $productNode) {
            $products[] = [
                'vendor' => $this->vendorName,
                'sku' => (int) $productNode->id,
                'name' => (string) $productNode->name,
                'description' => (string) $productNode->description,
                'price' => (float) $productNode->price,
                'category' => (string) $productNode->category,
                'image' => (string) $productNode->image,
            ];
        }

        return $products;
    }
}
