<?php
declare(strict_types=1);

use App\CommonItem;
use App\Recognizer\AgedBrieByNameRecognizer;
use App\Recognizer\BackstagePassByNameRecognizer;
use App\Recognizer\ByNameRecognizerInterface;
use App\Recognizer\SulfurasByNameRecognizer;
use PHPUnit\Framework\TestCase;

class NameRecognizerTest extends TestCase
{
    public function recognizableDataProvider(): \Generator
    {
        yield [new AgedBrieByNameRecognizer(), new CommonItem('Aged Brie', 1, 1)];
        yield [new BackstagePassByNameRecognizer(), new CommonItem('Backstage passes to a TAFKAL80ETC concert', 1, 1)];
        yield [new SulfurasByNameRecognizer(), new CommonItem('Sulfuras, Hand of Ragnaros', 1, 1)];
    }

    /**
     * @dataProvider recognizableDataProvider
     */
    public function testCanRecognizeItems(ByNameRecognizerInterface $recognizer, CommonItem $item): void
    {
        $this->assertTrue($recognizer->canRecognize($item));
    }

    public function unrecognizableDataProvider(): \Generator
    {
        yield [new BackstagePassByNameRecognizer(), new CommonItem('Aged Beer', 1, 1)];
        yield [new SulfurasByNameRecognizer(), new CommonItem('Backstage passes to a TAFKAL80ETC concert', 1, 1)];
        yield [new AgedBrieByNameRecognizer(), new CommonItem('Sulfuras, Hand of Ragnaros', 1, 1)];
    }

    /**
     * @dataProvider unrecognizableDataProvider
     */
    public function testCannotRecognizeItems(ByNameRecognizerInterface $recognizer, CommonItem $item): void
    {
        $this->assertFalse($recognizer->canRecognize($item));
    }
}