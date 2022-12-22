<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use PHPUnit\Runner\Exception;
use Test\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function testGetTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        $this->assertEquals(143, $totalPrice);
    }

    public function testGetProductSum(){
        $handler = (new ProductHandler());
        $sumResult = $handler->getProductSum($this->products);
        if (!$sumResult){
            throw new Exception('the data is empty');
        }
        var_dump($sumResult);
        //$this->assertEquals(143, $sumResult);
    }

    public function testSortProductPrice(){
        $handler = (new ProductHandler());
        $result = $handler->sortProductPrice($this->products);
        if (!$result){
            throw new Exception('the data is empty');
        }
        var_dump($result);
    }

    public function testDateToTimestamp(){
        $handler = (new ProductHandler());
        $result = $handler->dateToTimestamp(date("Y-m-d H:i:s"));
        if (!$result){
            throw new Exception('the data is empty');
        }
        var_dump($result);
    }
}