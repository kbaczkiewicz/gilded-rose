<?php
declare(strict_types=1);

namespace App\Recognizer;

use App\CommonItem;

class ItemRecognizer
{
    /**
     * @param ByNameRecognizerInterface[] $recognizers
     */
    public function __construct(private readonly array $recognizers)
    {
    }

    public function recognize(CommonItem &$item): void
    {
        foreach ($this->recognizers as $recognizer) {
            if ($recognizer->canRecognize($item)) {
                $item = $recognizer->recognize($item);

                return;
            }
        }
    }
}