<?php
declare(strict_types=1);

namespace App;

class BackstagePass extends Item
{
    public function advance(): void
    {
        $this->sellIn -= 1;
        $this->upgrade(1);

        if ($this->sellIn < 10) {
            $this->upgrade(1);
        }

        if ($this->sellIn < 5) {
            $this->upgrade(1);
        }

        if ($this->sellIn < 0) {
            $this->expire();
        }
    }

    private function expire(): void
    {
        $this->quality = 0;
    }
}