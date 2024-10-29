<?php
declare(strict_types=1);

use App\Sulfuras;
use PHPUnit\Framework\TestCase;

class SulfurasTest extends TestCase
{
    public function dataProvider(): \Generator
    {
        yield 'Sulfuras quality and sellIn never change' => ['Sulfuras', 10, 10, 80];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testAdvancingDoesNotChangeSellInAndQuality(
        string $name,
        int $sellIn,
        int $targetSellIn,
        int $targetQuality
    ): void {
        $item = new Sulfuras($name, $sellIn);

        $this->assertEquals($targetSellIn, $item->getSellIn());
        $this->assertEquals($targetQuality, $item->getQuality());

        $item->advance();

        $this->assertEquals($targetSellIn, $item->getSellIn());
        $this->assertEquals($targetQuality, $item->getQuality());
    }
}
