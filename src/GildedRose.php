<?php
declare(strict_types=1);
namespace App;

use App\Recognizer\ItemRecognizer;

final class GildedRose
{
    public function __construct(private readonly ItemRecognizer $recognizer)
    {
    }

    public function updateQuality(CommonItem $item): Item
    {
        $item = $this->recognizer->recognize($item);
        $item->advance();

        return $item;
    }
}
