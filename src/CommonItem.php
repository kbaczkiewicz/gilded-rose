<?php
declare(strict_types=1);

namespace App;

final class CommonItem extends Item
{
    public function advance(): void
    {
        $this->sellIn -= 1;
        $this->degrade(1);
        if ($this->isPastDue()) {
            $this->degrade(1);
        }
    }
}
