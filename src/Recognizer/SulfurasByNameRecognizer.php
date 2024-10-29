<?php
declare(strict_types=1);

namespace App\Recognizer;

use App\CommonItem;
use App\Item;
use App\Sulfuras;

class SulfurasByNameRecognizer implements ByNameRecognizerInterface
{
    private const RECOGNIZABLE_NAME = 'Sulfuras, Hand of Ragnaros';

    public function canRecognize(CommonItem $item): bool
    {
        return self::RECOGNIZABLE_NAME === $item->getName();
    }

    public function recognize(CommonItem $item): Item
    {
        return new Sulfuras($item->getName(), $item->getSellIn());
    }
}
