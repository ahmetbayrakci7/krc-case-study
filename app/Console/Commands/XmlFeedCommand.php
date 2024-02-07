<?php

namespace App\Console\Commands;

use App\Contracts\TransformerInterface;
use App\Models\Vendor;
use App\Services\FeedProcessor;
use App\Services\VendorFactory;
use Illuminate\Console\Command;

class XmlFeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:xml-feed-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Vendor Xml Feed description';

    /**
     * Execute the console command.
     */
    public function handle(VendorFactory $vendorFactory, FeedProcessor $feedProcessor)
    {
        $vendors = Vendor::all();
        foreach ($vendors as $vendor) {
            $products = $vendorFactory->vendors($vendor->slug);
            $feedProcessor->process($products->getData());
        }
    }
}
