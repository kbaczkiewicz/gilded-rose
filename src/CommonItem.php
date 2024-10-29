<?php
declare(strict_types=1);
namespace App;

final class CommonItem extends Item
{
    public function advance(): void
    {
        // TODO: Implement advance() method.
    }

    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
