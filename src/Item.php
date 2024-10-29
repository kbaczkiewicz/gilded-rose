<?php
declare(strict_types=1);

namespace App;

abstract class Item
{
    protected const MAXIMUM_QUALITY = 50;

    public function __construct(protected readonly string $name, protected int $sellIn, protected int $quality)
    {
    }

    abstract public function advance(): void;

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    protected function upgrade(int $quality): void
    {
        $this->quality = min($this->quality + $quality, self::MAXIMUM_QUALITY);
    }

    protected function degrade(int $quality): void
    {
        $this->quality = max($this->quality - $quality, 0);
    }

    protected function isPastDue(): bool
    {
        return $this->sellIn < 0;
    }
}
