<?php
declare(strict_types=1);

use App\AgedBrie;

class AgedBrieTest extends \PHPUnit\Framework\TestCase
{
    public function dataProvider(): \Generator
    {
        yield 'Advancing AgedBrie upgrades quality and decreases sellIn' => ['Brie', 3, 30, 2, 31];
        yield 'Advancing AgedBrie upgrades quality by 2 and decreases sellIn (into negative values)' => ['Brie', 0, 30, -1, 32];
        yield 'Advancing AgedBrie with maximum quality does not increase it further' => ['Brie', 0, 50, -1, 50];
        yield 'Advancing AgedBrie until maximum quality' => ['Brie', 0, 49, -1, 50];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testAdvancingSetsCorrectValues(
        string $name,
        int $sellIn,
        int $quality, int $targetSellIn,
        int $targetQuality
    ) {
        $item = new AgedBrie($name, $sellIn, $quality);

        $item->advance();

        $this->assertEquals($targetSellIn, $item->getSellIn());
        $this->assertEquals($targetQuality, $item->getQuality());
    }
}