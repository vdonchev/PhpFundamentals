<?php


namespace ShoppingApp\Models;


use ShoppingApp\Helpers\Validator;

class Person
{
    private $name;
    private $money;

    /**
     * @var Product[] $products
     */
    private $products = [];

    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        Validator::validateNonEmptyString($name, "Name");
        $this->name = $name;
    }

    public function setMoney(float $money)
    {
        Validator::validatePositiveNumber($money, "Money");
        $this->money = $money;
    }

    public function buyProduct(Product $product): bool
    {
        if ($this->money < $product->getPrice()) {
            return false;
        }

        $this->money -= $product->getPrice();
        $this->products[] = $product;

        return true;
    }

    public function __toString(): string
    {
        $output = "{$this->name} - ";
        if (count($this->products) === 0) {
            return $output . "Nothing bought";
        }

        return $output . implode(",",
                array_map(
                    function (Product $product) {
                        return $product->getName();
                    },
                    $this->products));
    }
}