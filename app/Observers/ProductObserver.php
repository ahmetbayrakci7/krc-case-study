<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\VendorXmlFeedNotification;

class ProductObserver
{
    private VendorXmlFeedNotification $feedNotification;

    public function __construct(VendorXmlFeedNotification $feedNotification)
    {
        $this->feedNotification = $feedNotification;
    }

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $created =  $this->feedNotification->insertDatabase($product);
//        burda mail gönderme, slack bildirimi iletme veya diğer apilere bildirimini gönderme gibi işlemler yapılabilir
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $updated =  $this->feedNotification->updateDatabase($product);
//        burda mail gönderme, slack bildirimi iletme veya diğer apilere bildirimini gönderme gibi işlemler yapılabilir
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $deleted =  $this->feedNotification->deleteDatabase($product);
//        burda mail gönderme, slack bildirimi iletme veya diğer apilere bildirimini gönderme gibi işlemler yapılabilir
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
