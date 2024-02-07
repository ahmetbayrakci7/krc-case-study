<?php

namespace App\Services;

use App\Models\Product;
class FeedProcessor
{
    public function process(array $transformData)
    {
        foreach ($transformData as $item) {
            $pr = Product::where('sku', $item['sku'])->first();
            if (!$pr){
                $this->addProduct($item);
            } else {
                $this->updateProduct($pr, $item);
            }
        }
    }

    private function addProduct($item): void
    {
        $product = new Product([
            'vendor' => $item['vendor'],
            'sku' => $item['sku'],
            'name' => $item['name'],
            'description' => $item['description'],
            'price' => $item['price'],
            'category' => $item['category'] ?? null,
            'brand' => $item['brand'] ?? null,
            'manufacturer' => $item['manufacturer'] ?? null,
            'shipping_cost' => $item['shipping_cost'] ?? null,
            'shipping_time' => $item['shipping_time'] ?? null,
            'is_stock' => $item['is_stock'] ?? 0,
            'image' => $item['image'] ?? null
        ]);
        $product->save();
    }

    private function updateProduct(Product $product, $item)
    {
        $product->sku = $item['sku'];
        $product->name = $item['name'];
        $product->description = $item['description'];
        $product->price = $item['price'];
        $product->category = $item['category'];
        $product->brand = $item['brand'] ?? null;
        $product->manufacturer = $item['manufacturer'] ?? null;
        $product->shipping_cost = $item['shipping_cost'] ?? null;
        $product->shipping_time = $item['shipping_time'] ?? null;
        $product->is_stock = $item['is_stock'] ?? 0;
        $product->image = $item['image'] ?? null;

        $product->update();
    }
}
