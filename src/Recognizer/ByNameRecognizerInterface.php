<?php
declare(strict_types=1);
namespace App\Recognizer;

use App\CommonItem;
use App\Item;

interface ByNameRecognizerInterface
{
    public function canRecognize(CommonItem $item): bool;

    public function recognize(CommonItem $item): Item;
}
