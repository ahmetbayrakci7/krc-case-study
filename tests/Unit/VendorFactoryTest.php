<?php

namespace Tests\Unit;

use App\Contracts\TransformerInterface;
use App\Models\Vendor;
use InvalidArgumentException;
use Tests\TestCase;
use App\Services\VendorFactory;

class VendorFactoryTest extends TestCase
{
    /**
     * Test that the factory creates the correct transformer for valid vendor names.
     */
    public function testCreatesCorrectTransformers()
    {
        $vendors = Vendor::all();

        foreach ($vendors as $vendor) {
            $transformer = (new VendorFactory)->vendors($vendor->slug);
            $this->assertInstanceOf(TransformerInterface::class, $transformer);
        }
    }

    /**
     * Test that the factory throws an exception for invalid vendor names.
     */
    public function testThrowsExceptionForInvalidVendorName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid vendor name');

        (new VendorFactory)->vendors('invalid_vendor');
    }
}
