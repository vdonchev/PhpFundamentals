<?php


namespace ShoppingApp\Models;


class Shop
{
    /**
     * @var Person[] $customers
     */
    private $customers = [];

    /**
     * @var Product[] $products
     */
    private $products = [];

    public function sellProduct(Product $product, Person $customer): bool
    {
        return $customer->buyProduct($product);
    }

    public function addCustomer(Person $customer)
    {
        $this->customers[$customer->getName()] = $customer;
    }

    public function addProduct(Product $product)
    {
        $this->products[$product->getName()] = $product;
    }

    public function getCustomer(string $name): Person
    {
        return $this->customers[$name];
    }

    public function getProduct(string $name): Product
    {
        return $this->products[$name];
    }

    /**
     * @return Person[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }
}