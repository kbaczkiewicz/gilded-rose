<?php
declare(strict_types=1);

namespace App;

class AgedBrie extends Item
{
    public function __construct(string $name, int $sellIn, int $quality)
    {
        parent::__construct($name, $sellIn, $quality);
    }

    public function advance(): void
    {
        $this->sellIn -= 1;
        if ($this->quality < 50) {
            if ($this->sellIn < 0) {
                $this->upgrade(2);
            } else {
                $this->upgrade(1);
            }
        }
    }
}