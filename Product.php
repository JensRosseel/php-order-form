<?php

class Product
{
    private string $name;
    private float $price;

    function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFromattedPrice()
    {
        return '€' . number_format($this->price, 2);
    }
}