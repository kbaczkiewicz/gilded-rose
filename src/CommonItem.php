<?php
declare(strict_types=1);
namespace App;

final class CommonItem extends Item
{
    public function advance(): void
    {
        $this->sellIn -= 1;
        if ($this->quality < 50) {
            if ($this->sellIn < 0) {
                $this->degrade(2);
            } else {
                $this->degrade(1);
            }
        }
    }

    public function setSellIn(int $sellIn): void
    {
        $this->sellIn = $sellIn;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }
}
