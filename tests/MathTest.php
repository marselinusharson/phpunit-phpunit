<?php

namespace Marselinus\Test{

    use PHPUnit\Framework\TestCase;

    class MathTest extends TestCase{
        public function testManual(){
            self::assertEquals(10, Math::sum([5,5]));
            self::assertEquals(24, Math::sum([4,4,4,4,4,4]));
            self::assertEquals(9, Math::sum([3,3,3]));
            self::assertEquals(0, Math::sum([]));
            self::assertEquals(2, Math::sum([2]));
        }

        // annotation untuk skenarion yang kompleks menggunakan data pprovider
        public function mathSumData():array{
            return [
                [[4,4,4,4], 16],
                [[5,5], 10],
                [[], 0],
                [[5,5,5,5,5], 25],
                [[6,6,6,6,6], 30],
            ];
        }

        /**
         * @dataProvider mathSumData 
        */ 

        public function testDataProvider(array $values, int $expected){
            self::assertEquals($expected, Math::sum($values));
        }
        
        // annotation untuk skenarion yang sederhana
        /** 
        * @testWith [[4,4,4,4], 16]
        *           [[5,5], 10]
        *           [[], 0]
        *           [[5,5,5,5,5], 25]
        *           [[6,6,6,6,6], 30]
        *           [[1,1], 2]
        */

        public function testWith(array $values, int $expected){
            self::assertEquals($expected, Math::sum($values));
        }
    }
}