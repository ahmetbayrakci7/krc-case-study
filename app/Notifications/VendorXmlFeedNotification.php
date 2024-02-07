<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VendorXmlFeedNotification extends Notification
{
    use Queueable;

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function insertDatabase(Product $product): array
    {
        return [
            'model_id' => $product->id,
            'model_type' => get_class($product),
            'data' => [
                'message' => $product->vendor. ' Feed Eklendi',
                'itemSku' => $product->sku,
            ]
        ];
    }

    public function updateDatabase(Product $product): array
    {
        return [
            'model_id' => $product->id,
            'model_type' => get_class($product),
            'data' => [
                'message' => $product->vendor. ' Feed Güncellendi',
                'itemSku' => $product->sku,
            ]
        ];
    }

    public function deleteDatabase(Product $product): array
    {
        return [
            'model_id' => $product->id,
            'model_type' => get_class($product),
            'data' => [
                'message' => $product->vendor. ' Feed Silindi',
                'itemSku' => $product->sku,
            ]
        ];
    }
}
