<?php

namespace Marselinus\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase
{
    public static Counter $counter;

    static public function setUpBeforeClass(): void
    {
        self::$counter = new Counter();   
    }

    public function testFirst()
    {
        self::$counter->increment();
        self::assertEquals(1,self::$counter->getCounter());
    }
    public function testSecond()
    {
        self::$counter->increment();
        self::assertEquals(2,self::$counter->getCounter());
    }


    static function tearDownAfterClass(): void
    {
        echo "Unit Test selesai".PHP_EOL;   
    }
}