<?php
namespace App\Transformers;

use App\Contracts\TransformerInterface;

use App\Vendors\Vendor2\Feed;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

class Vendor2Transformer implements TransformerInterface
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
                'sku' => (string) $productNode->sku,
                'name' => (string) $productNode->name,
                'description' => (string) $productNode->description,
                'price' => (float) $productNode->price,
                'category' => (string) $productNode->category,
                'brand' => (string) $productNode->brand,
                'is_stock' => (string) $productNode->availability == 'Tükendi' ? 0 : 1
            ];
        }

        return $products;
    }
}
