<?php
declare(strict_types=1);

namespace App\Recognizer;

use App\AgedBrie;
use App\CommonItem;
use App\Item;

class AgedBrieByNameRecognizer implements ByNameRecognizerInterface
{
    private const RECOGNIZABLE_NAME = 'Aged Brie';

    public function canRecognize(CommonItem $item): bool
    {
        return self::RECOGNIZABLE_NAME === $item->getName();
    }

    public function recognize(CommonItem $item): Item
    {
        return new AgedBrie($item->getName(), $item->getSellIn(), $item->getQuality());
    }
}
