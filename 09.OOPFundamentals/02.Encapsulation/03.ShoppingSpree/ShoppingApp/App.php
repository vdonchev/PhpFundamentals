<?php


namespace ShoppingApp;


use ShoppingApp\Models\Person;
use ShoppingApp\Models\Product;
use ShoppingApp\Models\Shop;

class App
{
    private $shop;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->shop = new Shop();
    }

    public function start()
    {
        $this->processInput();
        $this->printOutput();
    }

    private function processInput()
    {
        $customers = array_filter(explode(";", $this->readLine()));
        $products = array_filter(explode(";", $this->readLine()));

        try {
            foreach ($customers as $customerData) {
                $customerData = explode("=", $customerData);
                $customer = new Person($customerData[0], floatval($customerData[1]));
                $this->shop->addCustomer($customer);
            }

            foreach ($products as $productData) {
                $productData = explode("=", $productData);
                $product = new Product($productData[0], floatval($productData[1]));
                $this->shop->addProduct($product);
            }

            while (true) {
                $tradeDetails = explode(" ", $this->readLine());
                if ($tradeDetails[0] === "END") {
                    break;
                }

                $customer = $this->shop->getCustomer($tradeDetails[0]);
                $product = $this->shop->getProduct($tradeDetails[1]);

                if ($this->shop->sellProduct($product, $customer)) {
                    $this->writeLine("{$customer->getName()} bought {$product->getName()}");
                } else {
                    $this->writeLine("{$customer->getName()} can't afford {$product->getName()}");
                }
            }
        } catch (\Exception $e) {
            $this->writeLine($e->getMessage());
            exit();
        }
    }

    private function printOutput()
    {
        $customers = $this->shop->getCustomers();
        foreach ($customers as $customer) {
            $this->writeLine($customer);
        }
    }

    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }

    /**
     * @param $content mixed
     * @return void
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}