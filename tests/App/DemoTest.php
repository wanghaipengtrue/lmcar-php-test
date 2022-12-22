<?php

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;

/**
 * 题目 2 ： 编写单元测试
 */
class DemoTest extends TestCase
{

    /**
     * Fun:实现Demo foo
     * User:Atom
     * Date:2022/12/22 5:39 PM
     * Identifier:test_foo
     */
    public function test_foo()
    {
        $demo = new Demo(\Logger::class,new HttpRequest);
        $result = $demo->foo();
        var_dump($result);
    }

    /**
     * Fun:实现Demo get_user_info
     * User:Atom
     * Date:2022/12/22 5:39 PM
     * Identifier:test_get_user_info
     */
    public function test_get_user_info()
    {
        $demo = new Demo(\Logger::class,new HttpRequest);
        $result = $demo->get_user_info();
        var_dump($result);
    }
}
