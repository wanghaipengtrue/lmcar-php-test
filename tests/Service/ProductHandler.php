<?php

/**
 * 开发: Atom
 * 时间: 2022-12-22
 */

namespace Test\Service;

use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;

/**
 * 题目1：编写PriceHandler类
 * Class ProductHandler
 * @package Test\Service
 */
class ProductHandler
{

    /**
     * Fun:计算商品总金额
     * User:Atom
     * Date:2022/12/22 4:00 PM
     * Identifier:getProductSum
     * @param array $productData
     * @return false|float|int
     */
    public function getProductSum(array $productData)
    {
        if (!$productData) {
            return false;
        }
        return array_sum(array_column($productData, 'price'));
    }

    /**
     * Fun:商品金额降序并删除dessert商品
     * User:Atom
     * Date:2022/12/22 4:06 PM
     * Identifier:sortProductPrice
     * @param array $productData
     * @param string $type
     * @return array|false
     */
    public function sortProductPrice(array $productData, string $type = 'Dessert')
    {
        if (!$productData) {
            return false;
        }
        $arr = array_column($productData, 'price');
        array_multisort($arr, SORT_DESC, $productData);
        foreach ($productData as $key => $value) {
            if ($value['type'] == $type) {
                unset($productData[$key]);
            }
        }
        return $productData;
    }

    /**
     * Fun:日期 to 时间戳
     * User:Atom
     * Date:2022/12/22 4:29 PM
     * Identifier:dateToTimestamp
     * @param string $date
     * @return false|int
     */
    public function dateToTimestamp(string $date)
    {
        return strtotime($date ?? date("Y-m-d H:i:s"));
    }
}