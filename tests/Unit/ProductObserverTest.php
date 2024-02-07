<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Observers\ProductObserver;
use PHPUnit\Framework\MockObject\Exception;
use Tests\TestCase;

class ProductObserverTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function createdTest(): void
    {
        $pModel = $this->createMock(Product::class);
        $observer = $this->createMock(ProductObserver::class);

        $observer->expects($this->once())
            ->method('updated')
            ->with($pModel);

        $observer->created($pModel);
    }

    /**
     * @throws Exception
     */
    public function updatedTest(): void
    {
        $pModel = $this->createMock(Product::class);
        $observer = $this->createMock(ProductObserver::class);

        $observer->expects($this->once())
            ->method('created')
            ->with($pModel);

        $pModel->update();

        $observer->updated($pModel);
    }
}
