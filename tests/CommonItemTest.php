<?php
declare(strict_types=1);

use App\CommonItem;
use PHPUnit\Framework\TestCase;

class CommonItemTest extends TestCase
{
    public function dataProvider(): \Generator
    {
        yield 'Advancing CommonItem degrades quality and decreases sellIn' => ['Elixir', 3, 30, 2, 29];
        yield 'Advancing CommonItem degrades quality by 2 and decreases sellIn (into negative values)' => ['Elixir', 0, 30, -1, 28];
        yield 'Advancing CommonItem with minimum quality does not decrease it further' => ['Elixir', 0, 0, -1, 0];
        yield 'Advancing CommonItem until minimum quality' => ['Elixir', 0, 1, -1, 0];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testAdvancingSetsCorrectValues(
        string $name,
        int $sellIn,
        int $quality,
        int $targetSellIn,
        int $targetQuality
    ) {
        $item = new CommonItem($name, $sellIn, $quality);

        $item->advance();

        $this->assertEquals($targetSellIn, $item->getSellIn());
        $this->assertEquals($targetQuality, $item->getQuality());
    }
}