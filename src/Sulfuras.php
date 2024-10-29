<?php
declare(strict_types=1);
namespace App;

class Sulfuras extends Item
{
    public function __construct(string $name, int $sellIn)
    {
        parent::__construct($name, $sellIn, 80);
    }
    public function advance(): void
    {
    }
}
