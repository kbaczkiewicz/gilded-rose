<?php
declare(strict_types=1);
namespace App;

abstract class Item
{
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

    protected function upgrade(int $quality): void
    {
        $this->quality += $quality;
    }

    protected function degrade(int $quality): void
    {
        $this->quality -= $quality;
    }
}
