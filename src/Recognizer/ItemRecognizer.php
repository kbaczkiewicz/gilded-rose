<?php
declare(strict_types=1);

namespace App\Recognizer;

use App\CommonItem;
use App\Item;

class ItemRecognizer
{
    /**
     * @param ByNameRecognizerInterface[] $recognizers
     */
    public function __construct(private readonly array $recognizers)
    {
    }

    public function recognize(CommonItem $item): Item
    {
        foreach ($this->recognizers as $recognizer) {
            if ($recognizer->canRecognize($item)) {
                return $recognizer->recognize($item);
            }
        }

        return $item;
    }
}