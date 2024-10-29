<?php
declare(strict_types=1);

use App\BackstagePass;
use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{
    public function dataProvider(): \Generator
    {
        yield 'Date far away from gig' => ['Backstage pass', 13, 10, 12, 11];
        yield 'Date closer from gig' => ['Backstage pass', 11, 10, 10, 12];
        yield 'Date very close from gig' => ['Backstage pass', 6, 10, 5, 13];
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
