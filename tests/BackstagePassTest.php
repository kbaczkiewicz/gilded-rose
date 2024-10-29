<?php
declare(strict_types=1);

use App\BackstagePass;
use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    public function dataProvider(): \Generator
    {
        yield 'Date far away to gig' => ['Backstage pass', 13, 10, 12, 11];
        yield 'Date closer to gig' => ['Backstage pass', 10, 10, 9, 12];
        yield 'Date very close to gig' => ['Backstage pass', 5, 10, 4, 13];
        yield 'Date after gig' => ['Backstage pass', 0, 13, -1, 0];
        yield 'Date in gig day' => ['Backstage pass', 1, 10, 0, 13];
        yield 'Date in gig day with maximum quality' => ['Backstage pass', 1, 50, 0, 50];
        yield 'Date after gig with maximum quality' => ['Backstage pass', 0, 50, -1, 0];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testQualityIncreasesProperly(
        string $name,
        int $sellIn,
        int $quality,
        int $targetSellIn,
        int $targetQuality
    ): void {
        $item = new BackstagePass($name, $sellIn, $quality);

        $item->advance();

        $this->assertEquals($targetSellIn, $item->getSellIn());
        $this->assertEquals($targetQuality, $item->getQuality());
    }
}
