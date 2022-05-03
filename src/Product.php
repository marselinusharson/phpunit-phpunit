<?php

namespace Marselinus\Test;

class Product{
    private string $name, $id, $description;
    private int $price,$quantity;

    public function getName():string
    {
        return $this->name;
    }

    public function setName(string $name):void
    {
        $this->name = $name;
    }
    
    public function getId():string
    {
        return $this->id;
    }

    public function setId(string $id):void
    {
        $this->id = $id;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function setDescription(string $description):void
    {
        $this->description = $description;
    }
    
    public function getPrice():int
    {
        return $this->price;
    }

    public function setPrice(string $price):void
    {
        $this->price = $price;
    }
    
    public function getQuantity():int
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity):void
    {
        $this->quantity = $quantity;
    }
}