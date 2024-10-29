<?php
declare(strict_types=1);

namespace App;

class BackstagePass extends Item
{
    public function advance(): void
    {
        $this->sellIn -= 1;
        $this->upgrade(1);

        $this->upgradeAdditionallyForSpecificSellDue();

        if ($this->isPastDue()) {
            $this->expire();
        }
    }

    private function expire(): void
    {
        $this->quality = 0;
    }

    private function sellDueIsSoon(): bool
    {
        return $this->sellIn < 10;
    }

    private function sellDueIsVerySoon(): bool
    {
        return $this->sellIn < 5;
    }

    private function upgradeAdditionallyForSpecificSellDue(): void
    {
        if ($this->sellDueIsSoon()) {
            $this->upgrade(1);
        }

        if ($this->sellDueIsVerySoon()) {
            $this->upgrade(1);
        }
    }
}
