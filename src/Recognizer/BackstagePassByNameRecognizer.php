<?php
declare(strict_types=1);

namespace App\Recognizer;

use App\BackstagePass;
use App\CommonItem;
use App\Item;

class BackstagePassByNameRecognizer implements ByNameRecognizerInterface
{
    private const RECOGNIZABLE_NAME = 'Backstage passes to a TAFKAL80ETC concert';

    public function canRecognize(CommonItem $item): bool
    {
        return self::RECOGNIZABLE_NAME === $item->getName();
    }

    public function recognize(CommonItem $item): Item
    {
        return new BackstagePass($item->getName(), $item->getSellIn(), $item->getQuality());
    }
}
