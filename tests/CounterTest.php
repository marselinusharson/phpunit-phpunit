<?php

namespace Marselinus\Test{
    use PHPUnit\Framework\Assert;
    use PHPUnit\Framework\TestCase;

    class CounterTest extends TestCase{

        private Counter $counter;

        protected function setUp():void
        {
            $this->counter = new Counter();
            echo "membuat counter".PHP_EOL;
        }

        public function testCounter(){

            // $counter = new Counter();
            $this->counter->increment();
            $this->counter->increment();

            // assertion adalah ekspetasi kita akan sebuah methond atau function
            Assert::assertEquals(2, $this->counter->getCounter());
            
            // class TestCase turunan dari Assert
            // Sehingga bisa diakses menggunakan $this-> dan self karena static
            $this->counter->increment();
            self::assertEquals(3, $this->counter->getCounter());
            
            $this->counter->increment();
            $this->assertEquals(4, $this->counter->getCounter());
            
        }

        // running
        // vendor\bin\phpunit.bat --filter CounterTest::increment tests\CounterTest.php
        
        // anotation
        /**
        * @test
        */
        public function increment(){
            // $counter = new Counter();

            // skip test
            self::markTestSkipped("Masih ada error yang belum disolve");
            
            $this->counter->increment();
            $this->counter->increment();
    
            // assertion adalah ekspetasi kita akan sebuah methond atau function
            Assert::assertEquals(2, $this->counter->getCounter());
            
        }

        public function testFirst():Counter{
            // $counter = new Counter();
            $this->counter->increment();
            $this->assertEquals(1, $this->counter->getCounter());
            
            return $this->counter;
        }
        /**
         * @depends testFirst
         */
        public function testSecond(Counter $counter):void{
            
            $counter->increment();
            $this->assertEquals(2, $counter->getCounter());
        }

        protected function tearDown(): void
        {
            echo "TearDown".PHP_EOL;
        }

        /**
         * @after
         */

        protected function after():void
        {
            echo "After".PHP_EOL;
        }
        

        /**
         * @requires OSFAMILY Darwin
         */
        public function testOnlyDarwin()
        {
            self::assertTrue(true,"Only Mac");
        }
    }


}