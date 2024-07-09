<?php

namespace App\Cart;

use App\Models\Product;

class CartItem
{

    private int $id;
    private string $name;
    private float $price;
    private int $quantity;

    private ?Purchasable $product;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return CartItem
     */
    public function setId(int $id): CartItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CartItem
     */
    public function setName(string $name): CartItem
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return CartItem
     */
    public function setPrice(float $price): CartItem
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return CartItem
     */
    public function setQuantity(int $quantity): CartItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Purchasable|null
     */
    public function getProduct(): ?Purchasable
    {
        return $this->product;
    }

    /**
     * @param Purchasable|null $product
     * @return CartItem
     */
    public function setProduct(?Purchasable $product): CartItem
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->price * $this->quantity;
    }
}