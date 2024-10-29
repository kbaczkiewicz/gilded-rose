<?php
declare(strict_types=1);

use App\AgedBrie;
use App\BackstagePass;
use App\CommonItem;
use App\Recognizer\AgedBrieByNameRecognizer;
use App\Recognizer\BackstagePassByNameRecognizer;
use App\Recognizer\ItemRecognizer;
use App\Recognizer\SulfurasByNameRecognizer;
use App\Sulfuras;
use PHPUnit\Framework\TestCase;

class ItemRecognizerTest extends TestCase
{
    private ItemRecognizer $recognizer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->recognizer = new ItemRecognizer([
            new AgedBrieByNameRecognizer(),
            new SulfurasByNameRecognizer(),
            new BackstagePassByNameRecognizer()
        ]);
    }

    public function dataProvider(): \Generator
    {
        yield 'Recognized as common item' => [new CommonItem('Elixir of the Mongoose', 0, 0), CommonItem::class];
        yield 'Recognized as aged brie' => [new CommonItem('Aged Brie', 0, 0), AgedBrie::class];
        yield 'Recognized as Sulfuras' => [new CommonItem('Sulfuras, Hand of Ragnaros', 0, 0), Sulfuras::class];
        yield 'Recognized as backstage pass' => [new CommonItem('Backstage passes to a TAFKAL80ETC concert', 0, 0), BackstagePass::class];
    }

    /**
     * @dataProvider dataProvider
     */
    public function testRecognizedItemsHasCorrectType(CommonItem $item, string $type): void
    {
        $item = $this->recognizer->recognize($item);
        $this->assertEquals($type, $item::class);
    }
}
